<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create super admin user
        $user = User::factory()->create([
            'name' => 'SUPER ADMIN',
            'email' => 'super-admin@maagap.com',
            'password' => Hash::make('password'),
        ]);

        // Grant all permissions to super admin
        $permissions = Permission::all();
        $user->permissions()->sync($permissions->pluck('id'));
    }
} 