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
        $randomUsers = User::inRandomOrder()->take(11)->get();

        foreach ($randomUsers as $user) {
            UserLocation::create([
                'user_id' => $user->id,
                'latitude' => '-6.' . rand(1000000, 9999999),
                'longitude' => '106.' . rand(1000000, 9999999),
                'address' => 'Random Address ' . rand(1, 100)
            ]);
        }
    }
}
