<?php

namespace App\Livewire\Maintenance\Programs;

use App\Models\Program;
use Livewire\Component;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class Form extends Component
{
    public $program;
    public $isEdit = false;
    public $errorMessage = '';

    public function mount($program = null)
    {
        try {
            if ($program) {
                $programModel = Program::findOrFail($program);
                $this->program = $programModel->toArray();
                $this->isEdit = true;
            } else {
                $this->program = [
                    'name' => '',
                    'code' => '',
                    'description' => '',
                    'is_active' => true,
                ];
            }
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Program not found.');
            return redirect()->route('maintenance.programs.index');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while loading the program.');
            return redirect()->route('maintenance.programs.index');
        }
    }

    protected function rules()
    {
        return [
            'program.name' => 'required|string|max:255',
            'program.code' => 'required|string|max:50|unique:programs,code' . ($this->isEdit ? ',' . $this->program['id'] : ''),
            'program.description' => 'nullable|string',
            'program.is_active' => 'boolean',
        ];
    }

    protected function messages()
    {
        return [
            'program.name.required' => 'The name field is required.',
            'program.code.required' => 'The code field is required.',
            'program.code.unique' => 'This code is already in use.',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        try {
            $validatedData = $this->validate();
            
            DB::beginTransaction();
            
            $program = new Program();
            $program->fill($validatedData['program']);
            $program->save();
            
            DB::commit();

            session()->flash('message', 'Program created successfully.');
            return redirect()->route('maintenance.programs.index');
            
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create program. Please try again.');
            $this->errorMessage = 'An error occurred while saving the program.';
            return null;
        }
    }

    public function update()
    {
        try {
            $validatedData = $this->validate();
            
            DB::beginTransaction();

            $program = Program::findOrFail($this->program['id']);
            $program->fill($validatedData['program']);
            $program->save();
            
            DB::commit();

            session()->flash('message', 'Program updated successfully.');
            return redirect()->route('maintenance.programs.index');
            
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            session()->flash('error', 'Program not found.');
            return redirect()->route('maintenance.programs.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update program. Please try again.');
            $this->errorMessage = 'An error occurred while updating the program.';
            return null;
        }
    }

    public function render()
    {
        return view('livewire.maintenance.programs.form');
    }
} 