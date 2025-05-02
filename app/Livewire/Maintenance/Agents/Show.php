<?php

namespace App\Livewire\Maintenance\Agents;

use App\Models\Agent;
use Livewire\Component;

class Show extends Component
{
    public Agent $agent;

    public function mount(Agent $agent)
    {
        $this->agent = $agent;
    }

    public function render()
    {
        return view('livewire.maintenance.agents.show');
    }
} 