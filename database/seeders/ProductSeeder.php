<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'DOMESTIC 4 DAYS',
                'code' => 'DOM4',
                'description' => 'travel insurance for 4 days',
                'gross' => 625.00,
            ],
            [
                'name' => 'DOMESTIC 7 DAYS',
                'code' => 'DOM7',
                'description' => 'travel insurance for 7 days maximum',
                'gross' => 855.00,
            ],
            [
                'name' => 'DOMESTIC 14 DAYS',
                'code' => 'DOM14',
                'description' => 'travel insurance for 14 days',
                'gross' => 1200.00,
            ],
            [
                'name' => 'BASIC COVER 100',
                'code' => 'BC100',
                'description' => 'ALAGANG MAAGAP program with 100k coverage',
                'gross' => 645.00,
            ],
            [
                'name' => 'BASIC COVER 300',
                'code' => 'BC300',
                'description' => 'ALAGANG MAAGAP program with 300k coverage',
                'gross' => 1365.00,
            ],
            [
                'name' => 'BASIC COVER 500',
                'code' => 'BC500',
                'description' => 'ALAGANG MAAGAP program with 500k coverage',
                'gross' => 2105.00,
            ],
            [
                'name' => 'COMPREHENSIVE COVER 100',
                'code' => 'CC100',
                'description' => 'ALAGANG MAAGAP with 100k coverage',
                'gross' => 999.00,
            ],
            [
                'name' => 'COMPREHENSIVE COVER 300',
                'code' => 'CC300',
                'description' => 'ALAGANG MAAGAP with 300k coverage',
                'gross' => 2099.00,
            ],
            [
                'name' => 'COMPREHENSIVE COVER 500',
                'code' => 'CC500',
                'description' => 'ALAGANG MAAGAP with 500k coverage',
                'gross' => 3098.99,
            ],
            [
                'name' => 'PLAN 50K',
                'code' => 'PA50',
                'description' => '50k personal accident coverage',
                'gross' => 1205.00,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 