<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\applicant;
use App\ApplicantsData;
use App\ApproveApplicant;
use App\ActivityLogs;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeniedMail;
use App\Mail\ApprovedMail;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ApplicantsDataController extends Controller
{
public function index(){
  $applicantsDatas = ApplicantsData::orderBy('updated_at', 'desc')->get();
        return view('applicantsData')
                ->with ('applicantsDatas', $applicantsDatas);

}


public function update(Request $request, $id)
{
    date_default_timezone_set('Asia/Manila');
    $editorname = Auth::user()->full_name;

    $applicant = ApplicantsData::find($id);
    if ($applicant) {
        $applicant->rank = $request->input('rank');
        $applicant->first_name = $request->input('first_name');
        $applicant->middle_name = $request->input('middle_name');
        $applicant->last_name = $request->input('last_name');
        $applicant->qlr = $request->input('qlr');
        $applicant->badge_number = $request->input('badge_number');
        $applicant->unit = $request->input('unit');
        $applicant->purpose = $request->input('purpose');
        $applicant->specific_purpose = $request->input('specific_purpose');
        $applicant->email = $request->input('email');
        $applicant->contact_number = $request->input('contact_number');
        $applicant->status = $request->input('status');
        $applicant->reason = $request->input('reason');

     //////
      
     // Get the current date
    $currentDate = Carbon::now();

    // Get the year and month
    $year = $currentDate->format('Y');
    $month = $currentDate->format('m');

    // Count the number of records with the current year, month, and non-empty ctrl_no
    $recordCount = ApplicantsData::whereYear('created_at', $year)
                                  ->whereMonth('created_at', $month)
                                  ->whereNotNull('ctrl_no')
                                  ->count();
    $recordCount2 = ApproveApplicant::whereYear('created_at', $year)
                                  ->whereMonth('created_at', $month)
                                  ->whereNotNull('ctrl_no')
                                  ->count();
                                  $recordCount = $recordCount + $recordCount2;

    // If there are existing records, increment the series
    $series = ($recordCount > 0) ? $recordCount + 1 : 1;

    // Format of control number: year-month-series
    $controlNumber = sprintf('%04d-%02d-%02d', $year, $month, $series);

    // Save the new series to the database
    // $newControlNumber = new ApplicantsData();
    // $newControlNumber->ctrl_no = $controlNumber;
    // $newControlNumber->series = $series;
    // $newControlNumber->save();
// dd($controlNumber);
    /////
        

        // Check if the status is Uncleared and send email
        if ($applicant->status === 'Uncleared') {
            // Sending Email
            $rank = $applicant->rank;
            $first_name = $applicant->first_name;
            $middle_name = $applicant->middle_name;
            $last_name = $applicant->last_name;
            $qlr = $applicant->qlr;
            $reason = $applicant->reason;

            $email = $request->get('email');
            $data = ([
                'first_name' => $request->get('first_name'),
                'email' => $request->get('email'),
            ]);

            Mail::to($email)->send(new DeniedMail($rank, $first_name, $middle_name, $last_name, $qlr, $reason));
       
     $applicant->ctrl_no = $controlNumber;
        } 
        $applicant->ctrl_no = $controlNumber;
        // Save the record
        $save = $applicant->save();

        if ($save) {
            ActivityLogs::record(Auth::user()->id, 'UPDATED APPLICANT', "{$editorname} has updated {$applicant->rank} {$applicant->first_name} {$applicant->middle_name} {$applicant->last_name} {$applicant->qlr}'s records.");
            $noti = array('message' => 'Applicant Updated Successfully!', 'alert' => 'success');
            return response()->json($noti);
        } else {
            $noti = array('message' => 'Failed to update Applicant', 'alert' => 'error');
            return response()->json($noti);
        }
    }
    return redirect('/ApplicantsData');
}





  public function moveData() 
   {
    date_default_timezone_set('Asia/Manila');
    $records = ApplicantsData::whereIn('status',['Approved','Uncleared'])->get();
    $editorname = Auth::user()->full_name;
    

    foreach ($records as $record) {

          ApproveApplicant::create([
            'id' => $record->id,
            'rank' => $record->rank,
            'first_name' => $record->first_name,
            'middle_name' => $record->middle_name,
            'last_name' => $record->last_name,
            'qlr' => $record->qlr,
            'badge_number' => $record->badge_number,
            'unit' => $record->unit,
            'purpose' => $record->purpose,
            'specific_purpose' => $record->specific_purpose,
            'email' => $record->email,
            'contact_number' => $record->contact_number,
            'ctrl_no' => $record->ctrl_no, 
            'status' => $record->status,
            'reason' => $record->reason,
           
            $rank =  $record->rank,
            $first_name = $record->first_name,
            $middle_name = $record->middle_name,
            $last_name = $record->last_name,
            $qlr = $record->qlr,
         
          ]);
        //   dd($record->ctrl_no);
          $email = $record->get('email');
        // Mail::to($email)->send(new ApprovedMail($rank, $first_name,  $middle_name,  $last_name, $qlr));
        //   ActivityLogs::record(Auth::user()->id, 'RELEASED APPLICATION', "{$editorname} has released {$record->rank} {$record->first_name} {$record->middle_name} {$record->last_name} {$record->qlr}'s application.");
         
          $record->delete();
        }
       return response()->json(['message' => 'Data released successfully']);

  }                   
   
                               
public function show(Request $r)
        {
 $data = ApplicantsData::orderBy('created_at', 'desc')->get();
 $totalRecords = ApplicantsData::count();
 $totalFiltered = $totalRecords;
 $newData = array(); $i=0;// Define $newData here
                                
     foreach ($data as $d):
                             
     $dq =  ApplicantsData::where('id',$d->id)->orderBy('updated_at','desc')->get();
     $datatransactcount =  ApplicantsData::where('id',$d->id)->orderBy('updated_at','desc')->count();

     $btns = '<button data-toggle="dropdown" class="btn btn-success btn-outline dropdown-toggle" type="button">Action </button>
     <ul class="dropdown-menu">';
     
  
     $btns .= '<li><a class="ApproveApplicantModal id="editbtn"
         data-id="'.$d->id.'" 
         data-rank="'.$d->rank.'" data-first_name="'.$d->first_name.'" 
         data-middle_name="'.$d->middle_name.'" data-last_name="'.$d->last_name.'"
         data-qlr="'.$d->qlr.'" data-badge_number="'.$d->badge_number.'"
         data-unit="'.$d->unit.'" data-purpose="'.$d->purpose.'"
         data-email="'.$d->email.'" data-contact_number="'.$d->contact_number.'" data-status="'.$d->status.'" data-reason="'.$d->reason.'" data-ctrl_no="'.$d->ctrl_no. '" data-specific_purpose="'.$d->specific_purpose.'"
         >Edit Applicant</a></li>';
      
   
     $btns .= '<li><a class="MoveApproveModal" href="#" data-toggle="modal" data-target="#MoveApproveModal" id="approvedbtn"
         data-id="'.$d->id.'" 
         data-rank="'.$d->rank.'" data-first_name="'.$d->first_name.'" 
         data-middle_name="'.$d->middle_name.'" data-last_name="'.$d->last_name.'"
         data-qlr="'.$d->qlr.'" data-badge_number="'.$d->badge_number.'"
         data-unit="'.$d->unit.'" data-purpose="'.$d->purpose.'"
         data-email="'.$d->email.'" data-contact_number="'.$d->contact_number.'" data-status="'.$d->status.'" data-ctrl_no="'.$d->ctrl_no. '" data-specific_purpose="'.$d->specific_purpose.'" data-reason="'.$d->reason.'"
         >Release</a></li>';
      
     $btns .= '</ul>';
                                    
           $newData[$i] = array(
                 'no'=>$i+1+$r->input('start'),
                 'id' => $d->id,
                 'rank' => $d->rank,
                 'first_name' => $d->first_name,
                 'middle_name' => $d->middle_name,
                 'last_name' => $d->last_name,
                 'qlr' => $d->qlr,
                 'badge_number' => $d->badge_number,
                 'unit' => $d->unit,
                 'purpose' => $d->purpose,
                 'specific_purpose' => $d->specific_purpose,
                 'remarks' => $d->remarks,
                 
                  'email' => $d->email,
                 'contact_number' => $d->contact_number,
                 'status' => $d->status,
                 'reason' => $d->reason,
                 'ctrl_no' => $d->ctrl_no,
                 'created_at' => $d->created_at,
                 "action"=>$btns
               );
           $i++;
         endforeach;
         $response = array(
             "draw" => intval($r->input('draw')),
             "recordsTotal" => $totalRecords,
             "recordsFiltered" => $totalFiltered,
             "data" => $newData
          );
       return response()->json($response);
     }

    

     function generateControlNumber()
{
    // Get the current date
    $currentDate = Carbon::now();

    // Get the year and month
    $year = $currentDate->format('Y');
    $month = $currentDate->format('m');

    // Format of control number without series: year-month
    $controlNumberWithoutSeries = sprintf('%04d-%02d', $year, $month);

    // Find the highest control number from the database based on year and month
    $latestControlNumber = ApplicantsData::whereYear('created_at', $year)
                                         ->whereMonth('created_at', $month)
                                         ->orderBy('id', 'desc')
                                         ->first();

    // If no control number for this year and month, start a new series from 1
    $series = (!$latestControlNumber || $currentDate->format('m') !== $latestControlNumber->created_at->format('m')) ? 1 : $latestControlNumber->series + 1;

    // Format of control number: year-month-series
    $controlNumber = sprintf('%04d-%02d-%02d', $year, $month, $series);

    // Check for existing control numbers with the same year and month
    $existingControlNumbers = ApplicantsData::where('ctrl_no', 'LIKE', $controlNumberWithoutSeries . '%')
                                            ->where('ctrl_no', '!=', $controlNumber)
                                            ->count();

    // If found, increment the series
    if ($existingControlNumbers > 0) {
        $series += 1;
        $controlNumber = sprintf('%04d-%02d-%02d', $year, $month, $series);
    }

    // Save the new control number to the database
    // $newControlNumber = new ApplicantsData();
    // $newControlNumber->ctrl_no = $controlNumber;
    // // $newControlNumber->series = $series;
    // $newControlNumber->save();
//dd($controlNumber);
    return $controlNumber;
}

     
     
}


  

        

        





        
    



