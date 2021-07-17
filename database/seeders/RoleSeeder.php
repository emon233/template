<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['System Admin', 'Admin', 'User'];

        $roles = [
            [
                'title' => 'System Admin',
                'priority' => 100,
                'all_access' => 1,
                'has_admin_access' => 1,
                'is_default_role' => 0,
            ],
            [
                'title' => 'Admin',
                'priority' => 50,
                'all_access' => 0,
                'has_admin_access' => 1,
                'is_default_role' => 0,
            ],
            [
                'title' => 'Operator',
                'priority' => 40,
                'all_access' => 0,
                'has_admin_access' => 1,
                'is_default_role' => 0,
            ],
            [
                'title' => 'User',
                'priority' => 1,
                'all_access' => 0,
                'has_admin_access' => 0,
                'is_default_role' => 1,
            ]
        ];

        foreach($roles as $role) {
            Role::create([
                'title' => $role['title'],
                'priority' => $role['priority'],
                'all_access' => $role['all_access'],
                'has_admin_access' => $role['has_admin_access'],
                'is_default_role' => $role['is_default_role'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
