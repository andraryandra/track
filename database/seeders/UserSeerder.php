<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeerder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            \App\Models\User::create([
                'name' => 'user' . $i,
                'email' => 'user' . $i . '@gmail.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
