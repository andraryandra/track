<?php

namespace App\Http\Controllers\Web\Report;

use Illuminate\Http\Request;
use App\Models\Survey_Histories;
use App\Exports\ReportPoinExport;
use App\Exports\ReportSurveyExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function report_poin()
    {
        $data = [
            'historiSurvey' => Survey_Histories::all(),
            'active' => 'report'
        ];
        return view('pages.admin.report.report_user_poin', $data);
    }

    public function report_survey()
    {
        $data = [
            'historiSurvey' => Survey_Histories::all(),
            'active' => 'report'
        ];
        return view('pages.admin.report.report_survey', $data);
    }

    public function export_ReportSurvey()
    {
        return Excel::download(new ReportSurveyExport, 'Report Survey.xlsx');
    }
    public function export_ReportPoin()
    {
        return Excel::download(new ReportPoinExport, 'Report Poin.xlsx');
    }
}
