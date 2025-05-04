<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name' => 'STANDARD TRAVEL PACKAGE',
                'code' => 'STP',
                'description' => 'Basic travel insurance package with essential coverages',
            ],
            [
                'name' => 'PREMIUM TRAVEL PACKAGE',
                'code' => 'PTP',
                'description' => 'Enhanced travel insurance package with comprehensive coverages',
            ],
            [
                'name' => 'BUSINESS TRAVEL PACKAGE',
                'code' => 'BTP',
                'description' => 'Specialized travel insurance package for business travelers',
            ],
            [
                'name' => 'ALAGANG MAAGAP BASIC PACKAGE',
                'code' => 'ABP',
                'description' => 'Personal accident insurance package with flexible coverage options',
            ],
            [
                'name' => 'ALAGANG MAAGAP COMPREHENSIVE PACKAGE', 
                'code' => 'ACP',
                'description' => 'Comprehensive personal accident insurance package with enhanced coverage options',
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
} 