<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\applicant;
use App\ApplicantsData;
use App\ApproveApplicant;
use App\ActivityLogs;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedMail;
use App\Mail\DeniedMail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;


class ApprovedApplicantsDataController extends Controller
{
public function index(){
        $ApproveApplicants = ApproveApplicant::all();
        return view('ApprovedApplicantsData')
                ->with ('ApprovedApplicantsData', $ApproveApplicants);
        }

public function show(Request $r)
        {
 $data = ApproveApplicant::orderBy('created_at', 'desc')->get();
 $totalRecords = ApproveApplicant::count();
 $totalFiltered = $totalRecords;
 $newData = array(); $i=0;// Define $newData here
                                
     foreach ($data as $d):
                             
     $dq =  ApproveApplicant::where('id',$d->id)->orderBy('created_at','desc')->first();
     $datatransactcount =  ApproveApplicant::where('id',$d->id)->orderBy('created_at','desc')->count();


   
$btns =     '<button data-toggle="dropdown" class="btn btn-success btn-outline dropdown-toggle" type="button">Action </button>
     <ul class="dropdown-menu">';
     if ($d->received_by === null) {
$btns .= '  <li><a class="PrintModal_view"
data-id="'.$d->id.'" 
data-rank="'.$d->rank.'" data-first_name="'.$d->first_name.'" 
data-middle_name="'.$d->middle_name.'" data-last_name="'.$d->last_name.'"
data-qlr="'.$d->qlr.'" data-badge_number="'.$d->badge_number.'"
data-unit="'.$d->unit.'" data-purpose="'.$d->purpose.'"
data-email="'.$d->email.'" data-contact_number="'.$d->contact_number.'" data-status="'.$d->status.'" data-ctrl_no="'.$d->ctrl_no.'" data-specific_purpose="'.$d->specific_purpose.'" data-received_by="'.$d->received_by.'">View</a></li>';
$btns .= '   </ul>';

}else{
    $btns .= '<li><a href="print-applicant/'.$d->id.'">Print</a></li>'; 
$btns .= '   </ul>';
}
                                     
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
                 'specific_purpose' => $d-> specific_purpose,
                'email' => $d->email,
                 'contact_number' => $d->contact_number,
                 'status' => $d->status,
                 'ctrl_no' => $d->ctrl_no,
                 
                 'received_by' => $d->received_by,
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

public function CoundData()
{
    $todayDate = Carbon::today();

    $todayApplicants = ApplicantsData::whereDate('created_at', $todayDate)->count();
    $totalApplicant = ApplicantsData::count();
    $totalApprove = ApproveApplicant::count();

    return view('applicantDashboard', compact('totalApplicant', 'totalApprove', 'todayApplicants'));
}



public function showData()
{
    $data = ApproveApplicant::select('rank', 'first_name','middle_name','last_name','qlr','badge_number','unit','purpose', 'specific_purpose','email','contact_number','status')
                     ->get();
    // dd($data);
    return view('PrintApplicant', compact('data'));
}


public function PrintApplicant(Request $request, $id)
{
    $editorname = Auth::user()->full_name;
    // Retrieve the selected data from the database based on the ID
    $applicant = ApproveApplicant::find($id);
 

    if ($applicant) {
        ActivityLogs::record(Auth::user()->id, 'PRINTED CERTIFICATE', "{$editorname} has printed {$applicant->rank} {$applicant->first_name} {$applicant->middle_name} {$applicant->last_name} {$applicant->qlr}'s certificate.");
    
        if ($applicant->reason === null && $applicant->purpose === 'Loan') {
            $pdf = Pdf::loadView('Print', ['applicant' => $applicant]);
    
            // Generate a random filename for the PDF
            $randomFilename = Str::random(10) . '.pdf';
    
            // Save the PDF to the desired directory with the random filename
            $pdfPath = storage_path('app/public/image/' . $randomFilename);
            $pdf->save($pdfPath);
    
            if (file_exists($pdfPath)) {
                $applicant->pdf_path = $pdfPath;
                $applicant->save();
    
                Mail::to($applicant->email)->send(new ApprovedMail(
                    $applicant->rank,
                    $applicant->first_name,
                    $applicant->middle_name,
                    $applicant->last_name,
                    $applicant->qlr,
                    $pdfPath
                ));
    
               
		  return $pdf->download($randomFilename);  
			
} else {
                info("PDF file does not exist at path: " . $pdfPath);
            }
        } else {
            ActivityLogs::record(Auth::user()->id, 'PRINTED CERTIFICATE', "{$editorname} has printed {$applicant->rank} {$applicant->first_name} {$applicant->middle_name} {$applicant->last_name} {$applicant->qlr}'s certificate.");
            
            return view('Print', ['applicant' => $applicant]);
        }
    }
    
 
}       

public function sharp(Request $request, $id)
{

    try {
            date_default_timezone_set('Asia/Manila');
            $editorname = Auth::user()->full_name;

            $applicant = ApproveApplicant::find($id);
            if ($applicant) {
                $applicant->received_by = $request->input('received_by');
                $result = $applicant->save();
                return response()->json(['success' => true, 'data' => $result]);
            }
           
        } catch (\Exception $e) {
            // Handle the exception
    
            // Log the exception for further investigation
            // Log::error('Exception caught: ' . $e->getMessage());
    
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }           
}
}