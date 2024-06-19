<?php

namespace App\Http\Controllers;

use App\ApplicantsLog;
use App\ActivityLogs;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class RecentActivityController extends Controller
{
    public function show(Request $r){
      $data = ApplicantsLog::orderBy('created_at', 'desc')->get();
        $totalRecords = ApplicantsLog::count();
        $totalFiltered = $totalRecords;
        $newData = array(); $i=0;// Define $newData here
                                    
         foreach ($data as $d):
                                 
         $dq =  ApplicantsLog::where('id',$d->id)->orderBy('created_at','desc')->get();
         $datatransactcount =  ApplicantsLog::where('id',$d->id)->orderBy('created_at','desc')->count();
        
        $btns =     '<button data-toggle="dropdown" class="btn btn-success btn-outline dropdown-toggle" type="button">Action </button>
                        <ul class="dropdown-menu">';
        $btns .= '  <li><a class="EditUserModal">Edit Profile</a></li>';
        $btns .= '  <li><a class="exampleModal" data-toggle="modal" data-target="#exampleModal">Change Email/Password</a></li>';
             $btns .= '</ul>';
                                        
               $newData[$i] = array(
                     'no'=>$i+1+$r->input('start'),
                     'id' => $d->id,
                     'applicant_id' => $d->applicant_id,
                     'action' => $d->action,
                     'details' => $d->details,
                     'ip_address' => $d->ip_address,
                     'created_by' => $d->created_by,
                     'created_at' => $d->created_at,
                     
                     
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


    public function index(){
        $activity = ApplicantsLog::all();
        return view('RecentActivity')
                ->with ('activity', $activity);
}

public function showLogs(Request $r){
    $data = ActivityLogs::orderBy('created_at', 'desc')->get();
    $totalRecords = ActivityLogs::count();
    $totalFiltered = $totalRecords;
    $newData = array(); $i=0;// Define $newData here
                                
     foreach ($data as $d):
                             
     $dq =  ActivityLogs::where('id',$d->id)->orderBy('created_at','desc')->get();
     $datatransactcount =  ActivityLogs::where('id',$d->id)->orderBy('created_at','desc')->count();
    
    $btns =     '<button data-toggle="dropdown" class="btn btn-success btn-outline dropdown-toggle" type="button">Action </button>
                    <ul class="dropdown-menu">';
    $btns .= '  <li><a class="EditUserModal">Edit Profile</a></li>';
    $btns .= '  <li><a class="exampleModal" data-toggle="modal" data-target="#exampleModal">Change Email/Password</a></li>';
         $btns .= '</ul>';
                                    
           $newData[$i] = array(
                 'no'=>$i+1+$r->input('start'),
                 'id' => $d->id,
                 'applicant_id' => $d->applicant_id,
                 'action' => $d->action,
                 'details' => $d->details,
                 'ip_address' => $d->ip_address,
                 'created_by' => $d->created_by,
                 'created_at' => $d->created_at,
                 
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


public function indexLogs(){
    $activity = ActivityLogs::all();
    return view('ActivityLogs')
            ->with ('activity', $activity);
}

public function showSideNav()
{
    $todayDate = Carbon::today();
    
    $todayRegistration = ApplicantsLog::whereDate('created_at', $todayDate)->count();
    $todayActivity = ActivityLogs::whereDate('created_at', $todayDate)->count();
    $total = ApplicantsLog::count();


    return view('side_nav', compact('todayRegistration', 'todayActivity'));
}

}
