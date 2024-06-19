<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\applicant;
use App\ApplicantsData;
use App\ApproveApplicant;
use App\ActivityLogs;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeniedMail;
use App\Mail\ApprovedMail;
use App\CaseMonitoring;
use Auth;
use DB;

class SearchController extends Controller
{
public function search(Request $request)
{
    $startDatetime = $request->input('start_datetime');
    $endDatetime = $request->input('end_datetime');

    $results = ApproveApplicant::whereBetween('created_at', [$startDatetime, $endDatetime])->get();

    return view('search-results', compact('results','startDatetime', 'endDatetime'));
}
public function countData()
{
    $januaryCount = ApproveApplicant::whereMonth('created_at', '=', 1)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $februaryCount = ApproveApplicant::whereMonth('created_at', '=', 2)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $marchCount = ApproveApplicant::whereMonth('created_at', '=', 3)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $aprilCount = ApproveApplicant::whereMonth('created_at', '=', 4)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $mayCount = ApproveApplicant::whereMonth('created_at', '=', 5)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $juneCount = ApproveApplicant::whereMonth('created_at', '=', 6)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $julyCount = ApproveApplicant::whereMonth('created_at', '=', 7)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $augustCount = ApproveApplicant::whereMonth('created_at', '=', 8)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $septCount = ApproveApplicant::whereMonth('created_at', '=', 9)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $octCount = ApproveApplicant::whereMonth('created_at', '=', 10)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $novCount = ApproveApplicant::whereMonth('created_at', '=', 11)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

    $decCount = ApproveApplicant::whereMonth('created_at', '=', 12)
    ->whereYear('created_at', '=', date('Y'))
    ->count();

return view('welcome', compact('januaryCount','februaryCount','marchCount','aprilCount','mayCount','juneCount','julyCount','augustCount','septCount','octCount','novCount','decCount'));
}
}