<?php

namespace App\Livewire\UserPermissions;

use App\Models\User;
use App\Models\Permission;
use Livewire\Component;

class EditUser extends Component
{
    public User $user;
    public $selectedPermissions = [];
    public $permissions;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->selectedPermissions = $user->permissions->pluck('id')->toArray();
        $this->permissions = Permission::all();
    }

    public function selectAll()
    {
        $this->selectedPermissions = $this->permissions->pluck('id')->toArray();
    }

    public function deselectAll()
    {
        $this->selectedPermissions = [];
    }

    public function save()
    {
        $this->user->permissions()->sync($this->selectedPermissions);
        session()->flash('message', 'Permissions updated successfully.');
        
        $this->redirectRoute('user-permissions.index');
    }

    public function render()
    {
        return view('livewire.user-permissions.edit-user');
    }
} 