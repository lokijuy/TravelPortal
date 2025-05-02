<?php

namespace App\Livewire\PolicyIssuance;

use App\Models\PolicyIssuance;
use Livewire\Component;

class Show extends Component
{
    public PolicyIssuance $policy;

    public function mount(PolicyIssuance $policy)
    {
        $this->policy = $policy;
    }

    public function render()
    {
        return view('livewire.policy-issuance.show');
    }
} 