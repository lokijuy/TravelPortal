<?php

namespace App\Livewire\PolicyIssuance;

use App\Models\PolicyIssuance;
use Livewire\Component;
use Livewire\WithPagination;

class Posted extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'posted_at';
    public $sortDirection = 'desc';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'posted_at'],
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

    public function render()
    {
        $policies = PolicyIssuance::query()
            ->posted()
            ->when($this->search, function ($query) {
                $query->where(function ($query) {
                    $query->where('full_name', 'like', '%' . $this->search . '%')
                        ->orWhere('document_number', 'like', '%' . $this->search . '%')
                        ->orWhere('department', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.policy-issuance.posted', [
            'policies' => $policies,
        ]);
    }
} 