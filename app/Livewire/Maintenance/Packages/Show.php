<?php

namespace App\Livewire\Maintenance\Packages;

use App\Models\Package;
use Livewire\Component;

class Show extends Component
{
    public Package $package;

    public function mount(Package $package)
    {
        $this->package = $package;
    }

    public function render()
    {
        return view('livewire.maintenance.packages.show');
    }
} 