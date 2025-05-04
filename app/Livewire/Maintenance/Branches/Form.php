<?php

namespace App\Livewire\Maintenance\Branches;

use App\Models\Branch;
use Livewire\Component;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class Form extends Component
{
    public $branch;
    public $isEdit = false;
    public $errorMessage = '';

    public function mount($branch = null)
    {
        try {
            if ($branch) {
                $branchModel = Branch::findOrFail($branch);
                $this->branch = $branchModel->toArray();
                $this->isEdit = true;
            } else {
                $this->branch = [
                    'name' => '',
                    'code' => '',
                    'lgt_rate' => 0,
                ];
            }
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Branch not found.');
            $this->redirectRoute('maintenance.branches.index');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while loading the branch.');
            $this->redirectRoute('maintenance.branches.index');
        }
    }

    protected function rules()
    {
        return [
            'branch.name' => 'required|string|max:255',
            'branch.code' => 'required|string|max:50|unique:branches,code' . ($this->isEdit ? ',' . $this->branch['id'] : ''),
            'branch.lgt_rate' => 'required|numeric|min:0|max:100',
        ];
    }

    protected function messages()
    {
        return [
            'branch.name.required' => 'The name field is required.',
            'branch.code.required' => 'The code field is required.',
            'branch.code.unique' => 'This code is already in use.',
            'branch.lgt_rate.required' => 'The LGT rate field is required.',
            'branch.lgt_rate.numeric' => 'The LGT rate must be a number.',
            'branch.lgt_rate.min' => 'The LGT rate must be at least 0.',
            'branch.lgt_rate.max' => 'The LGT rate cannot be greater than 100.',
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
            
            $branch = new Branch();
            $branch->fill($validatedData['branch']);
            $branch->save();
            
            DB::commit();

            session()->flash('message', 'Branch created successfully.');
            $this->redirectRoute('maintenance.branches.index');
            
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create branch. Please try again.');
            $this->errorMessage = 'An error occurred while saving the branch.';
        }
    }

    public function update()
    {
        try {
            $validatedData = $this->validate();
            
            DB::beginTransaction();

            $branch = Branch::findOrFail($this->branch['id']);
            $branch->fill($validatedData['branch']);
            $branch->save();
            
            DB::commit();

            session()->flash('message', 'Branch updated successfully.');
            $this->redirectRoute('maintenance.branches.index');
            
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            session()->flash('error', 'Branch not found.');
            $this->redirectRoute('maintenance.branches.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update branch. Please try again.');
            $this->errorMessage = 'An error occurred while updating the branch.';
        }
    }

    public function render()
    {
        return view('livewire.maintenance.branches.form');
    }
} 