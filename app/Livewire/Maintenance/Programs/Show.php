<?php

namespace App\Livewire\Maintenance\Programs;

use App\Models\Program;
use Livewire\Component;

class Show extends Component
{
    public Program $program;

    public function mount(Program $program)
    {
        $this->program = $program;
    }

    public function render()
    {
        return view('livewire.maintenance.programs.show');
    }
} 