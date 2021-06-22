<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
        'name' => 'Azad Eyvazov',
        'email' => 'azad.eyvazov99@gmail.com',
        'email_verified_at' => now(),
        'type' => 'admin',
        'password' => bcrypt('azad1234'),
        'remember_token' => Str::random(10),
    ]);
        \App\Models\User::factory(5)->create();
    }
}
