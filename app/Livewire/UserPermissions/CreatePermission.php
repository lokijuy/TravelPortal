<?php

namespace App\Livewire\UserPermissions;

use Livewire\Component;
use App\Models\Permission;

class CreatePermission  extends Component
{
    public $name;
    public $display_name;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255|unique:permissions,name',
        'display_name' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
    ];

    public function save()
    {
        $this->validate();

        Permission::create([
            'name' => $this->name,
            'display_name' => $this->display_name,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Permission created successfully.');
        $this->redirectRoute('user-permissions.index');
    }

    public function render()
    {
        return view('livewire.user-permissions.create-permission');
    }
} 