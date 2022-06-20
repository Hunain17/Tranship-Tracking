<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UsersRole::create([
            'name' => 'Master Admin',
        ]);
        \App\Models\UsersRole::create([
            'name' => 'Create Record',
        ]);
        \App\Models\UsersRole::create([
            'name' => 'Record',
        ]);
        \App\Models\UsersRole::create([
            'name' => 'Records Settings',
        ]);
    }
}
