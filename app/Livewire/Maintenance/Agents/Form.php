<?php

namespace App\Livewire\Maintenance\Agents;

use App\Models\Agent;
use App\Models\Branch;
use App\Models\Package;
use Livewire\Component;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class Form extends Component
{
    public $agent;
    public $isEdit = false;
    public $errorMessage = '';

    public function mount($agent = null)
    {
        try {
            if ($agent) {
                $agentModel = Agent::findOrFail($agent);
                $this->agent = $agentModel->toArray();
                $this->isEdit = true;
            } else {
                $this->agent = [
                    'name' => '',
                    'code' => '',
                    'branch_id' => '',
                    'package_id' => '',
                ];
            }
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Agent not found.');
            return redirect()->route('maintenance.agents.index');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while loading the agent.');
            return redirect()->route('maintenance.agents.index');
        }
    }

    protected function rules()
    {
        return [
            'agent.name' => 'required|string|max:255',
            'agent.code' => 'required|string|max:50|unique:agents,code' . ($this->isEdit ? ',' . $this->agent['id'] : ''),
            'agent.branch_id' => 'required|exists:branches,id',
            'agent.package_id' => 'required|exists:packages,id',
        ];
    }

    protected function messages()
    {
        return [
            'agent.name.required' => 'The name field is required.',
            'agent.code.required' => 'The code field is required.',
            'agent.code.unique' => 'This code is already in use.',
            'agent.branch_id.required' => 'Please select a branch.',
            'agent.branch_id.exists' => 'The selected branch is invalid.',
            'agent.package_id.required' => 'Please select a package.',
            'agent.package_id.exists' => 'The selected package is invalid.',
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
            
            $agent = new Agent();
            $agent->fill($validatedData['agent']);
            $agent->save();
            
            DB::commit();

            session()->flash('message', 'Agent created successfully.');
            return redirect()->route('maintenance.agents.index');
            
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create agent. Please try again.');
            $this->errorMessage = 'An error occurred while saving the agent.';
            return null;
        }
    }

    public function update()
    {
        try {
            $validatedData = $this->validate();
            
            DB::beginTransaction();

            $agent = Agent::findOrFail($this->agent['id']);
            $agent->fill($validatedData['agent']);
            $agent->save();
            
            DB::commit();

            session()->flash('message', 'Agent updated successfully.');
            return redirect()->route('maintenance.agents.index');
            
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            session()->flash('error', 'Agent not found.');
            return redirect()->route('maintenance.agents.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update agent. Please try again.');
            $this->errorMessage = 'An error occurred while updating the agent.';
            return null;
        }
    }

    public function render()
    {
        return view('livewire.maintenance.agents.form', [
            'branches' => Branch::orderBy('name')->get(),
            'packages' => Package::orderBy('name')->get(),
        ]);
    }
} 