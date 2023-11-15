<?php

namespace App\Exports;

use App\Models\ReportSurvey;
use App\Models\Survey_Histories;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportSurveyExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $reportSurvey = Survey_Histories::select(
            'user_id',
            'survey_id',
            'click_date',
        )->get();

        // Inisialisasi nomor awal
        $nomor = 1;

        // Modifikasi data dan tambahkan nomor
        $data = $reportSurvey->map(function ($report) use (&$nomor) {
            return [
                'No' => $nomor++,
                'Nama Survey' => $report->survey->name,
                'Respondent Name' => $report->user->name,
                'Response Date' => $report->click_date,
                'Link Survey' => $report->survey->link_survey,
                'Start Date Survey' => $report->survey->start_date,
                'End Date Survey' => $report->survey->end_date,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'NO',
            'NAME SURVEY',
            'RESPONDENT NAME',
            'RESPONSE DATE',
            'LINK SURVEY',
            'START DATE SURVEY',
            'END DATE SURVEY',
        ];
    }
}
