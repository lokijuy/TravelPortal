<?php

namespace App\Livewire\UserPermissions;

use App\Models\Permission;
use Livewire\Component;
use Livewire\Attributes\Rule;

class EditPermission extends Component
{
    public Permission $permission;

    #[Rule('required|min:3|max:255')]
    public $name = '';
    #[Rule('required|min:3|max:255')]
    public $display_name = '';
    #[Rule('nullable|max:255')]
    public $description = '';

    public function mount(Permission $permission)
    {
        $this->permission = $permission;
        $this->name = $permission->name;
        $this->display_name = $permission->display_name;
        $this->description = $permission->description;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|min:3|max:255|unique:permissions,name,' . $this->permission->id,
            'display_name' => 'required|min:3|max:255|unique:permissions,display_name,' . $this->permission->id,
            'description' => 'nullable|max:255',
        ]);

        $this->permission->update([
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Permission updated successfully.');
        
        $this->redirectRoute('user-permissions.index');
    }

    public function render()
    {
        return view('livewire.user-permissions.edit-permission');
    }
} 