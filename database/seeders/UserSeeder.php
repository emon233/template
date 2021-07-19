<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::orderBy('priority', 'desc')->get();

        foreach($roles as $role) {
            $users = $role->priority == 100 ? 1:4;
            for($i=0; $i<$users; $i++) {
                User::create([
                    'role_id' => $role->id,
                    'first_name' => $role->title,
                    'last_name' => 'User ' . $i,
                    'email' => str_replace(' ', '-', strtolower($role->title)) . $i .'@adminlte.laravel',
                    'email_verified_at' => now(),
                    'phone_no' => null,
                    'phone_no_verified_at' => null,
                    'password' => bcrypt('password'),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
