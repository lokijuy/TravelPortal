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
            ],
            [
                'name' => 'Accidental Medical Reimbursement',
            ],
            [
                'name' => 'Accident Burial Expense',
            ],
            [
                'name' => 'Cash Assistance',
            ],
            [
                'name' => 'Unprovoked Murder and Assault',
            ],
            [
                'name' => 'Motorcycling Coverage',
            ],
            [
                'name' => 'Daily Hospital income benefit',
            ],
            [
                'name' => 'Repatriation of Mortal Remains',
            ],
            [
                'name' => 'Common Carrier Benefit',
            ]
        ];

        foreach ($coverages as $coverage) {
            Coverage::create($coverage);
        }
    }
} 