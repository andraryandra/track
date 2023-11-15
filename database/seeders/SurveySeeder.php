<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua category_id dari tabel category_surveys
        $categoryIds = DB::table('category_surveys')->pluck('id')->toArray();

        for ($i = 0; $i < 11; $i++) {
            DB::table('surveys')->insert([
                'id' => Str::uuid(),
                'category_id' => $this->getRandomId($categoryIds),
                'name' => "Survey $i",
                'link_survey' => "https://example.com/survey$i",
                'polygon' => json_encode(['latitude' => 123.456, 'longitude' => 789.012]),
                'description' => "Description for Survey $i",
                'poin' => '10',
                'location' => "Location $i",
                'start_date' => now()->addDays($i),
                'end_date' => now()->addDays($i + 10),
                'visit_max' => rand(1, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    private function getRandomId(array $array)
    {
        return $array[array_rand($array)];
    }
}
