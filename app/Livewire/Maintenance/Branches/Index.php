<?php

namespace App\Livewire\Maintenance\Branches;

use App\Models\Branch;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc'],
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

    public function deleteBranch($branchId)
    {
        $branch = Branch::find($branchId);
        
        if ($branch) {
            $branch->delete();
            
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Branch deleted successfully.',
            ]);
        }
    }

    public function render()
    {
        $branches = Branch::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('code', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.maintenance.branches.index', [
            'branches' => $branches,
        ]);
    }
} 