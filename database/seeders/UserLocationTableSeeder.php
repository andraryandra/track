<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserLocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $randomUser = User::inRandomOrder()->first();

        UserLocation::create([
            'user_id' => $randomUser->id,
            'latitude' => '48.858844',
            'longitude' => '2.294351',
            'address' => 'Eiffel Tower, Paris, France'
        ]);
    }
}
