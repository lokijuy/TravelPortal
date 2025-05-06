<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // PermissionSeeder::class,
            BranchSeeder::class,
            AgentSeeder::class,
            PackageSeeder::class,
            ProgramSeeder::class,
            ProductSeeder::class,
            CoverageSeeder::class,
            BenefitSeeder::class,
            SuperAdminSeeder::class,
            UserSeeder::class,
        ]);
    }
}
