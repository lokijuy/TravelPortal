<?php

namespace App\Livewire\UserPermissions;

use App\Models\User;
use App\Models\Permission;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    #[On('permission-created')]
    #[On('permission-updated')]
    public function refreshPermissions()
    {
        $this->resetPage('permissions');
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function deletePermission($permissionId)
    {
        $permission = Permission::find($permissionId);
        
        if ($permission) {
            $permission->delete();
            
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Permission deleted successfully.',
            ]);
        }
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10, ['*'], 'users');

        $permissions = Permission::latest()
            ->paginate(10, ['*'], 'permissions');

        return view('livewire.user-permissions.index', [
            'users' => $users,
            'permissions' => $permissions,
        ]);
    }
} 