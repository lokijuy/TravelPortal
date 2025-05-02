<?php

namespace App\Livewire\Maintenance\Coverages;

use App\Models\Coverage;
use Livewire\Component;

class Show extends Component
{
    public Coverage $coverage;

    public function mount(Coverage $coverage)
    {
        $this->coverage = $coverage;
    }

    public function render()
    {
        return view('livewire.maintenance.coverages.show');
    }
} 