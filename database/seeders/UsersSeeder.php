<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'first_name' => 'Umer',
            'last_name' => 'Farooq',
            'user_name' => 'umerfarooq',
            'email' => 'uf@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => 1,
            'profile_photo' => 'profiles/default.png',
            'email_verified_at' => Carbon::now()
        ]);
    }
}
