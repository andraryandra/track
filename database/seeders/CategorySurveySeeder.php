<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 11; $i++) {
            DB::table('category_surveys')->insert([
                'id' => Str::uuid(),
                'name' => "Category $i",
                'description' => "Description for Category $i",
                'icon' => "icon$i.png", // Gantilah dengan nama file ikon yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
