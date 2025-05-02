<?php

namespace App\Livewire\PolicyIssuance;

use App\Models\PolicyIssuance;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $policy = PolicyIssuance::findOrFail($id);
        $policy->delete();
        
        session()->flash('message', 'Travel Policy deleted successfully.');
    }

    public function post($id)
    {
        $policy = PolicyIssuance::findOrFail($id);
        $policy->update([
            'status' => 'posted',
            'posted_at' => now(),
            'document_number' => 'TP-' . str_pad($policy->id, 6, '0', STR_PAD_LEFT),
        ]);
        
        session()->flash('message', 'Travel Policy posted successfully.');
    }

    public function render()
    {
        $policies = PolicyIssuance::query()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('full_name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('department', 'like', '%' . $this->search . '%')
                        ->orWhere('document_number', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.policy-issuance.index', [
            'policies' => $policies,
        ]);
    }
} 