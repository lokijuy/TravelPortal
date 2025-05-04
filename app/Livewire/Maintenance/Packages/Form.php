<?php

namespace App\Livewire\Maintenance\Packages;

use App\Models\Package;
use Livewire\Component;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class Form extends Component
{
    public $package;
    public $isEdit = false;
    public $errorMessage = '';

    public function mount($package = null)
    {
        try {
            if ($package) {
                $packageModel = Package::findOrFail($package);
                $this->package = $packageModel->toArray();
                $this->isEdit = true;
            } else {
                $this->package = [
                    'name' => '',
                    'code' => '',
                    'description' => '',
                ];
            }
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Package not found.');
            $this->redirectRoute('maintenance.packages.index');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while loading the package.');
            $this->redirectRoute('maintenance.packages.index');
        }
    }

    protected function rules()
    {
        return [
            'package.name' => 'required|string|max:255',
            'package.code' => 'required|string|max:50|unique:packages,code' . ($this->isEdit ? ',' . $this->package['id'] : ''),
            'package.description' => 'nullable|string',
        ];
    }

    protected function messages()
    {
        return [
            'package.name.required' => 'The name field is required.',
            'package.code.required' => 'The code field is required.',
            'package.code.unique' => 'This code is already in use.',
            'package.description.string' => 'The description must be a string.',
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
            
            $package = new Package();
            $package->fill($validatedData['package']);
            $package->save();
            
            DB::commit();

            session()->flash('message', 'Package created successfully.');
            $this->redirectRoute('maintenance.packages.index');
            
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create package. Please try again.');
            $this->errorMessage = 'An error occurred while saving the package.';
        }
    }

    public function update()
    {
        try {
            $validatedData = $this->validate();
            
            DB::beginTransaction();

            $package = Package::findOrFail($this->package['id']);
            $package->fill($validatedData['package']);
            $package->save();
            
            DB::commit();

            session()->flash('message', 'Package updated successfully.');
            $this->redirectRoute('maintenance.packages.index');
            
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            session()->flash('error', 'Package not found.');
            $this->redirectRoute('maintenance.packages.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update package. Please try again.');
            $this->errorMessage = 'An error occurred while updating the package.';
        }
    }

    public function render()
    {
        return view('livewire.maintenance.packages.form');
    }
} 