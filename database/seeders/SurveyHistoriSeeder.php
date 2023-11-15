<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SurveyHistoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dapatkan ID pengguna dan ID survei secara acak
        $userIds = \App\Models\User::pluck('id')->toArray();
        $surveyIds = \App\Models\Survey::pluck('id')->toArray();

        if (empty($userIds) || empty($surveyIds)) {
            // Handle array kosong sesuai kebutuhan Anda.
            // Misalnya, throw exception atau keluar dari metode.
            // Contoh:
            throw new \Exception("UserIds or SurveyIds array is empty");
        }

        for ($i = 0; $i < 11; $i++) {
            DB::table('survey_histories')->insert([
                'user_id' => $this->getRandomId($userIds),
                'survey_id' => $this->getRandomId($surveyIds),
                'click_date' => now()->subDays(rand(1, 30)), // Subtraksikan hari acak antara 1 dan 30 dari hari ini
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
