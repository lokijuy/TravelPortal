<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::insert([
            [
                'name' => 'Makati',
                'code' => 'MK', 
                'lgt_rate' => 0.20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Manila',
                'code' => 'ML',
                'lgt_rate' => 0.11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cebu',
                'code' => 'MM',
                'lgt_rate' => 0.50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bacolod',
                'code' => 'MQ',
                'lgt_rate' => 0.75,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dagupan',
                'code' => 'MN',
                'lgt_rate' => 0.75,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Davao',
                'code' => 'MP',
                'lgt_rate' => 0.55,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bulacan',
                'code' => 'MS',
                'lgt_rate' => 0.50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Batangas',
                'code' => 'MT',
                'lgt_rate' => 0.75,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cagayan De Oro',
                'code' => 'MR',
                'lgt_rate' => 0.75,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pampanga',
                'code' => 'MV',
                'lgt_rate' => 0.83,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ilo-Ilo',
                'code' => 'MU',
                'lgt_rate' => 0.50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'General Santos',
                'code' => 'MW',
                'lgt_rate' => 0.75,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Cavite',
                'code' => 'MX',
                'lgt_rate' => 0.15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Palawan',
                'code' => 'MY',
                'lgt_rate' => 0.67,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
} 