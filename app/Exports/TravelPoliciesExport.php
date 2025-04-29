<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TravelPoliciesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $policies;

    public function __construct(Collection $policies)
    {
        $this->policies = $policies;
    }

    public function collection()
    {
        return $this->policies;
    }

    public function headings(): array
    {
        return [
            'Document Number',
            'Full Name',
            'Email',
            'Department',
            'Position',
            'Destination',
            'Departure Date',
            'Return Date',
            'Purpose of Travel',
            'Estimated Cost',
            'Posted Date',
        ];
    }

    public function map($policy): array
    {
        return [
            $policy->document_number,
            $policy->full_name,
            $policy->email,
            $policy->department,
            $policy->position,
            $policy->destination,
            $policy->departure_date->format('Y-m-d'),
            $policy->return_date->format('Y-m-d'),
            $policy->purpose_of_travel,
            $policy->estimated_cost,
            $policy->posted_at->format('Y-m-d H:i:s'),
        ];
    }
} 