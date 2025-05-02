<?php

namespace App\Livewire\PolicyIssuance;

use App\Models\PolicyIssuance;
use Livewire\Component;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class Form extends Component
{
    public $policy;
    public $isEdit = false;
    public $errorMessage = '';

    public function mount($policy = null)
    {
        try {
            if ($policy) {
                $travelPolicy = PolicyIssuance::findOrFail($policy);
                $this->policy = $travelPolicy->toArray();
                $this->isEdit = true;
            } else {
                $this->policy = [
                    'full_name' => '',
                    'email' => '',
                    'phone_number' => '',
                    'department' => '',
                    'position' => '',
                    'destination' => '',
                    'departure_date' => '',
                    'return_date' => '',
                    'purpose_of_travel' => '',
                    'estimated_cost' => '',
                ];
            }
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Travel Policy not found.');
            return redirect()->route('policy-issuance.index');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while loading the travel policy.');
            return redirect()->route('policy-issuance.index');
        }
    }

    protected function rules()
    {
        return [
            'policy.full_name' => 'required|string|max:255',
            'policy.email' => 'required|email|max:255',
            'policy.phone_number' => 'required|string|max:20',
            'policy.department' => 'required|string|max:255',
            'policy.position' => 'required|string|max:255',
            'policy.destination' => 'required|string|max:255',
            'policy.departure_date' => 'required|date|after_or_equal:today',
            'policy.return_date' => 'required|date|after_or_equal:policy.departure_date',
            'policy.purpose_of_travel' => 'required|string',
            'policy.estimated_cost' => 'required|numeric|min:0',
        ];
    }

    protected function messages()
    {
        return [
            'policy.full_name.required' => 'The full name field is required.',
            'policy.email.required' => 'The email field is required.',
            'policy.email.email' => 'Please enter a valid email address.',
            'policy.phone_number.required' => 'The phone number field is required.',
            'policy.department.required' => 'The department field is required.',
            'policy.position.required' => 'The position field is required.',
            'policy.destination.required' => 'The destination field is required.',
            'policy.departure_date.required' => 'The departure date field is required.',
            'policy.departure_date.after_or_equal' => 'The departure date must be today or a future date.',
            'policy.return_date.required' => 'The return date field is required.',
            'policy.return_date.after_or_equal' => 'The return date must be after or equal to the departure date.',
            'policy.purpose_of_travel.required' => 'The purpose of travel field is required.',
            'policy.estimated_cost.required' => 'The estimated cost field is required.',
            'policy.estimated_cost.numeric' => 'The estimated cost must be a number.',
            'policy.estimated_cost.min' => 'The estimated cost must be at least 0.',
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
            
            $travelPolicy = new PolicyIssuance();
            $travelPolicy->fill($validatedData['policy']);
            $travelPolicy->status = 'draft';
            $travelPolicy->save();
            
            DB::commit();

            session()->flash('message', 'Travel Policy created successfully.');
            return redirect()->route('policy-issuance.index');
            
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to create travel policy. Please try again.');
            $this->errorMessage = 'An error occurred while saving the travel policy.';
            return null;
        }
    }

    public function update()
    {
        try {
            $validatedData = $this->validate();
            
            DB::beginTransaction();

            $travelPolicy = PolicyIssuance::findOrFail($this->policy['id']);
            $travelPolicy->fill($validatedData['policy']);
            
            // Keep the existing status if it's already set
            if (!$travelPolicy->status) {
                $travelPolicy->status = 'draft';
            }
            
            $travelPolicy->save();
            
            DB::commit();

            session()->flash('message', 'Travel Policy updated successfully.');
            return redirect()->route('policy-issuance.index');
            
        } catch (ModelNotFoundException $e) {
            DB::rollBack();
            session()->flash('error', 'Travel Policy not found.');
            return redirect()->route('policy-issuance.index');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Failed to update travel policy. Please try again.');
            $this->errorMessage = 'An error occurred while updating the travel policy.';
            return null;
        }
    }

    public function render()
    {
        return view('livewire.policy-issuance.form');
    }
} 