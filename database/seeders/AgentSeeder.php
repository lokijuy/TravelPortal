<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agent::create([
            'name' => 'MAAGAP INSURANCE',
            'code' => 'MAAGAP',
            'branch_id' => 1,
        ]);
    }
} 