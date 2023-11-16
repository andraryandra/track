<?php

namespace App\Http\Controllers\Web\Report;

// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\Survey_Histories;
use App\Exports\ReportPoinExport;
use App\Exports\ReportSurveyExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //Halaman Report Poin
    public function report_poin()
    {
        $data = [
            'historiSurvey' => Survey_Histories::all(),
            'active' => 'report'
        ];
        return view('pages.admin.report.report_user_poin', $data);
    }

    //Halaman Report Survey
    public function report_survey()
    {
        $data = [
            'historiSurvey' => Survey_Histories::all(),
            'active' => 'report'
        ];
        return view('pages.admin.report.report_survey', $data);
    }

    // Export Excel Report survey
    public function export_ReportSurvey()
    {
        return Excel::download(new ReportSurveyExport, 'Report Survey.xlsx');
    }

    // Export Excel Report poin
    public function export_ReportPoin()
    {
        return Excel::download(new ReportPoinExport, 'Report Poin.xlsx');
    }

    // Export PDF Report survey
    public function generatePDFSurvey()
    {
        $report = Survey_Histories::get();
        $data = [
            'title' => 'Report Survey',
            'reports' => $report
        ];
        $pdf = app('dompdf.wrapper')->loadView('pages.admin.report.pdf_survey', $data);
        return $pdf->download('Report_Survey.pdf');
    }

    // Export PDF Report poin
    public function generatePDFPoin()
    {
        $report = Survey_Histories::get();
        $data = [
            'title' => 'Report Poin',
            'reports' => $report
        ];
        $pdf = app('dompdf.wrapper')->loadView('pages.admin.report.pdf_poin', $data);
        return $pdf->download('Report_Poin.pdf');
    }
}
