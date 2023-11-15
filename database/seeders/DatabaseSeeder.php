<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\UserSeerder;
use Database\Seeders\UserPoinSeeder;
use Database\Seeders\CreateAdminUserSeeder;
use Database\Seeders\PermissionTableSeeder;
use Database\Seeders\UserLocationTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // UserSeeder::class,
            UserSeerder::class,
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            UserLocationTableSeeder::class,
            UserPoinSeeder::class,
            CategorySurveySeeder::class,
            SurveySeeder::class,
            SurveyHistoriSeeder::class,
        ]);
    }
}
