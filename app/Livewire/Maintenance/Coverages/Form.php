<?php

namespace App\Livewire\Maintenance\Coverages;

use App\Models\Coverage;
use Livewire\Component;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class Form extends Component
{
    public $coverage;
    public $isEdit = false;
    public $errorMessage = '';

    public function mount($coverage = null)
    {
        try {
            if ($coverage) {
                $coverageModel = Coverage::findOrFail($coverage);
                $this->coverage = $coverageModel->toArray();
                $this->isEdit = true;
            } else {
                $this->coverage = [
                    'name' => '',
                    'code' => '',
                    'description' => '',
                    'is_active' => true,
                ];
            }
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Coverage not found.');
            return redirect()->route('maintenance.coverages.index');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while loading the coverage.');
            return redirect()->route('maintenance.coverages.index');
        }
    }

    protected function rules()
    {
        return [
            'coverage.name' => 'required|string|max:255',
            'coverage.code' => 'required|string|max:50|unique:coverages,code' . ($this->isEdit ? ',' . $this->coverage['id'] : ''),
            'coverage.description' => 'nullable|string',
            'coverage.is_active' => 'boolean',
        ];
    }

    protected function messages()
    {
        return [
            'coverage.name.required' => 'The name field is required.',
            'coverage.code.required' => 'The code field is required.',
            'coverage.code.unique' => 'This code is already in use.',
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
            
            $coverage = new Coverage();
            $coverage->fill($validatedData['coverage']);
            $coverage->save();
            
            DB::commit();

            session()->flash('message', 'Coverage created successfully.');
            return redirect()->route('maintenance.coverages.index');
            
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create coverage. Please try again.');
            $this->errorMessage = 'An error occurred while saving the coverage.';
            return null;
        }
    }

    public function update()
    {
        try {
            $validatedData = $this->validate();
            
            DB::beginTransaction();

            $coverage = Coverage::findOrFail($this->coverage['id']);
            $coverage->fill($validatedData['coverage']);
            $coverage->save();
            
            DB::commit();

            session()->flash('message', 'Coverage updated successfully.');
            return redirect()->route('maintenance.coverages.index');
            
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            session()->flash('error', 'Coverage not found.');
            return redirect()->route('maintenance.coverages.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update coverage. Please try again.');
            $this->errorMessage = 'An error occurred while updating the coverage.';
            return null;
        }
    }

    public function render()
    {
        return view('livewire.maintenance.coverages.form');
    }
} 