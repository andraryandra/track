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
        // $users = User::inRandomOrder()->take(2)->get();

        // foreach ($users as $user) {
        //     $latitude = rand(-90, 90) + (rand(0, 999) / 1000); // Koordinat acak antara -90 dan 90
        //     $longitude = rand(-180, 180) + (rand(0, 999) / 1000); // Koordinat acak antara -180 dan 180

        //     UserLocation::create([
        //         'user_id' => $user->id,
        //         'latitude' => $latitude,
        //         'longitude' => $longitude,
        //         'address' => 'Alamat Acak'
        //     ]);
        // }
        $randomUser = User::inRandomOrder()->first();

        UserLocation::create([
            'user_id' => $randomUser->id,
            'latitude' => '-6.1755081',
            'longitude' => '106.8267134',
            'address' => 'Eiffel Tower, Paris, France'
        ]);

        UserLocation::create([
            'user_id' => $randomUser->id,
            'latitude' => '-6.2692502',
            'longitude' => '106.6571587',
            'address' => 'Vila melati mas'
        ]);
    }
}
