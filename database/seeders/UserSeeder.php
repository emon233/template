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
        // $role = Role::where('all_access', true)->first();

        // User::create([
        //     'role_id' => $role->id,
        //     'first_name' => "System",
        //     'last_name' => "Administrator",
        //     'email' => 'sazid.hossain.1433@gmail.com',
        //     'email_verified_at' => now(),
        //     'phone_no' => '+8801311022920',
        //     'phone_no_verified_at' => now(),
        //     'password' => bcrypt('password'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        $role = Role::where('priority', 99)->first();

        for ($i = 1; $i < 45000; $i++) {
            $number = (100000 + $i);
            User::create([
                'role_id' => $role->id,
                'first_name' => "Priority 99",
                'last_name' => "User " . $i,
                'email' => 'system-user-99-1-' . $i . '@template.com',
                'email_verified_at' => now(),
                'phone_no' => '+8801' . rand(3, 9) . rand(11, 99) . $number,
                'phone_no_verified_at' => now(),
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        $role = Role::where('priority', 98)->first();

        for ($i = 1; $i < 50000; $i++) {
            $number = 400000 + $i;
            User::create([
                'role_id' => $role->id,
                'first_name' => "Priority 98",
                'last_name' => "User " . $i,
                'email' => 'system-user-98-' . $i . '@template.com',
                'email_verified_at' => now(),
                'phone_no' => '+8801' . rand(3, 9) . rand(11, 99) . $number,
                'phone_no_verified_at' => now(),
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
