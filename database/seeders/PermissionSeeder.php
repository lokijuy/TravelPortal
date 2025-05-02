<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            [
                'name' => 'manage-maintenance',
                'display_name' => 'Manage Maintenance',
                'module' => 'Maintenance',
                'description' => 'Allows user to manage branches, agents, packages, programs, products, and coverages',
            ],
            [
                'name' => 'view-policies',
                'display_name' => 'View Policies',
                'module' => 'Policy Issuance',
                'description' => 'Allows user to view travel policies',
            ],
            [
                'name' => 'create-policies',
                'display_name' => 'Create Policies',
                'module' => 'Policy Issuance',
                'description' => 'Allows user to create new travel policies',
            ],
            [
                'name' => 'edit-policies',
                'display_name' => 'Edit Policies',
                'module' => 'Policy Issuance',
                'description' => 'Allows user to edit existing travel policies',
            ],
            [
                'name' => 'view-posted-policies',
                'display_name' => 'View Posted Policies',
                'module' => 'Posted Transactions',
                'description' => 'Allows user to view posted policies',
            ],
            [
                'name' => 'view-reports',
                'display_name' => 'View Reports',
                'module' => 'Reports',
                'description' => 'Allows user to view reports',
            ],
            [
                'name' => 'manage-permissions',
                'display_name' => 'Manage Permissions',
                'module' => 'User Management',
                'description' => 'Allows user to manage permissions and user access',
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                $permission
            );
        }
    }
} 