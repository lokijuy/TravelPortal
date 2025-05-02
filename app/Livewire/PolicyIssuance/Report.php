<?php

namespace App\Livewire\PolicyIssuance;

use Livewire\Component;
use App\Models\PolicyIssuance;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TravelPoliciesExport;

class Report extends Component
{
    use WithFileUploads;

    public $fromDate;
    public $toDate;
    public $message;

    protected $rules = [
        'fromDate' => 'required|date',
        'toDate' => 'required|date|after_or_equal:fromDate',
    ];

    public function export()
    {
        $this->validate();

        $policies = PolicyIssuance::query()
            ->posted()
            ->whereBetween('posted_at', [$this->fromDate . ' 00:00:00', $this->toDate . ' 23:59:59'])
            ->get();

        if ($policies->isEmpty()) {
            $this->message = 'No records found for the selected date range.';
            return;
        }

        return Excel::download(
            new TravelPoliciesExport($policies),
            'travel_policies_' . now()->format('Y-m-d_His') . '.xlsx'
        );
    }

    public function render()
    {
        return view('livewire.policy-issuance.report');
    }
} 