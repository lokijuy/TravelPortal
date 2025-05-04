<?php

namespace Database\Seeders;

use App\Models\Coverage;
use Illuminate\Database\Seeder;

class CoverageSeeder extends Seeder
{
    public function run(): void
    {
        $coverages = [
            [
                'name' => 'Accidental Death / Permanent Total Disablement',
                'value' => 100000.00,
            ],
            [
                'name' => 'Accidental Medical Reimbursement',
                'value' => 15000.00,
            ],
            [
                'name' => 'Accident Burial Expense',
                'value' => 15000.00,
            ],
            [
                'name' => 'Cash Assistance',
                'value' => 5000.00,
            ],
            [
                'name' => 'Unprovoked Murder and Assault',
                'value' => 100000.00,
            ],
            [
                'name' => 'Motorcycling Coverage',
                'value' => 25000.00,
            ],
            [
                'name' => 'Daily Hospital income benefit',
                'value' => 1000.00,
            ],
            [
                'name' => 'Repatriation of Mortal Remains',
                'value' => 75000.00,
            ],
            [
                'name' => 'Common Carrier Benefit',
                'value' => 75000.00,
            ]

        ];

        foreach ($coverages as $coverage) {
            Coverage::create($coverage);
        }
    }
} 