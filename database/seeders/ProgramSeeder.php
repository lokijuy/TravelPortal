<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'name' => 'DOMESTIC TRAVEL',
                'code' => 'DT',
                'description' => 'Insurance program for domestic travel within the Philippines',
            ],
            [
                'name' => 'SCHENGEN TRAVEL',
                'code' => 'ST',
                'description' => 'Specialized insurance program for Schengen visa requirements',
            ],
            [
                'name' => 'INTERNATIONAL TRAVEL',
                'code' => 'IT',
                'description' => 'Insurance program for international travel',
            ],
            [
                'name' => 'Personal Accident',
                'code' => 'PA',
                'description' => 'general personal accident',
            ],
            [
                'name' => 'Mediphone',
                'code' => 'MP',
                'description' => 'Telemedicine',
            ],
            [
                'name' => 'PA Cancer',
                'code' => 'CC',
                'description' => 'Cancer patient insurance',
            ],
            [
                'name' => 'ALAGANG MAAGAP BASIC',
                'code' => 'AB',
                'description' => 'Personal accident insurance program with basic coverage',
            ],
            [
                'name' => 'ALAGANG MAAGAP COMPREHENSIVE',
                'code' => 'AC',
                'description' => 'Personal accident insurance program with comprehensive coverage',
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
} 