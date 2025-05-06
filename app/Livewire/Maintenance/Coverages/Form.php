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
                ];
            }
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Coverage not found.');
            $this->redirectRoute('maintenance.coverages.index');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while loading the coverage.');
            $this->redirectRoute('maintenance.coverages.index');
        }
    }

    protected function rules()
    {
        return [
            'coverage.name' => 'required|string|max:255',
        ];
    }

    protected function messages()
    {
        return [
            'coverage.name.required' => 'The name field is required.',
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
            $this->redirectRoute('maintenance.coverages.index');
            
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create coverage. Please try again.');
            $this->errorMessage = 'An error occurred while saving the coverage.';
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
            $this->redirectRoute('maintenance.coverages.index');
            
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            session()->flash('error', 'Coverage not found.');
            $this->redirectRoute('maintenance.coverages.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update coverage. Please try again.');
            $this->errorMessage = 'An error occurred while updating the coverage.';
        }
    }

    public function render()
    {
        return view('livewire.maintenance.coverages.form');
    }
} 