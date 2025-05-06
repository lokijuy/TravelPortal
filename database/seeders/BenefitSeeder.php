<?php

namespace Database\Seeders;

use App\Models\SumInsured;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $benefitValues = [
            ['value' => 100],
            ['value' => 200],
            ['value' => 300],
            ['value' => 400],
            ['value' => 500],
            ['value' => 600],
            ['value' => 700],
            ['value' => 800],
            ['value' => 900],
            ['value' => 1000],
            ['value' => 2000],
            ['value' => 3000],
            ['value' => 4000],
            ['value' => 5000],
        ];

        // Add values from 5000 to 2000000 with 5000 increments
        for ($amount = 10000; $amount <= 2000000; $amount += 5000) {
            $benefitValues[] = ['value' => $amount];
        }

        DB::table('benefits')->insert($benefitValues);
    }
} 