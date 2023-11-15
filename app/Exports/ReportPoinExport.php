<?php

namespace App\Exports;

use App\Models\Survey_Histories;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReportPoinExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $reportPoin = Survey_Histories::select(
            'user_id',
            'survey_id',
            'click_date',
        )->get();

        // Inisialisasi nomor awal
        $nomor = 1;

        // Modifikasi data dan tambahkan nomor
        $data = $reportPoin->map(function ($report) use (&$nomor) {
            return [
                'No' => $nomor++,
                'Name' => $report->user->name,
                'Name Survey' => $report->survey->name,
                'Poin Yang di Dapat' => $report->survey->poin,
                'Tanggal Poin' => $report->click_date,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'NO',
            'NAME',
            'NAME SURVEY',
            'POIN YANG DI DAPAT',
            'TANGGAL POIN',
        ];
    }
}
