<?php

namespace App\Livewire\Maintenance\Branches;

use App\Models\Branch;
use Livewire\Component;

class Show extends Component
{
    public Branch $branch;

    public function mount(Branch $branch)
    {
        $this->branch = $branch;
    }

    public function render()
    {
        return view('livewire.maintenance.branches.show');
    }
} 