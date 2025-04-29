<?php

namespace App\Livewire\TravelPolicy;

use App\Models\TravelPolicy;
use Livewire\Component;

class Show extends Component
{
    public TravelPolicy $policy;

    public function mount(TravelPolicy $policy)
    {
        $this->policy = $policy;
    }

    public function render()
    {
        return view('livewire.travel-policy.show');
    }
} 