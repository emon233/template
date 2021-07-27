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
        $role = Role::where('all_access', true)->first();

        User::create([
            'role_id' => $role->id,
            'first_name' => "System",
            'last_name' => "Administrator",
            'email' => 'sazid.hossain.1433@gmail.com',
            'email_verified_at' => now(),
            'phone_no' => '+8801311022920',
            'phone_no_verified_at' => now(),
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
