<?php

namespace App\Http\Controllers\Web\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Survey_Histories;

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

    // public function export_ReportSurvey()
    // {
    //     return Excel::download(new PetternLotPetiExport, 'PATTERN LOT PETI.xlsx');
    // }
}
