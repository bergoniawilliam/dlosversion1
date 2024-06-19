<?php

namespace App\Http\Controllers;

use App\ApplicantsLog;
use App\ActivityLogs;
use Illuminate\Http\Request;
use App\Applicant;
use App\ApplicantsData;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Refrank;


class ApplicationFormController Extends Controller
{
 
    public function index(){
      
        return view('homepage');
    }

    public function refRanks(){
      $ranks = Refrank::all()->pluck('abbvr');
      return json_encode($ranks);
   }

public function store(Request $Request) 

    {

    
      date_default_timezone_set('Asia/Manila');

      // $checkemail = ApplicantsData::where('email',$Request->email)->first();
      // if($checkemail){
      //     $notif = array('message' => 'Email already in use','alert' => 'error');
      //     return response()->json($notif); 
      // } if (!$request->filled('g-recaptcha-response')) {
        if (!$Request->filled('g-recaptcha-response')) {
          $noti = array('message' => 'Please complete the reCAPTCHA!','alert' => 'error');
          return response()->json($noti); 
      }else{

        $recaptchaResponse = $Request->input('g-recaptcha-response');
        $new = new ApplicantsData();

        $new->rank = $Request->rank;
        $fullname = $this->capitalizedRanks($Request->rank,$Request->first_name,$Request->middle_name,$Request->last_name,$Request->qlr);

        $new->first_name = $fullname['first_name'];
        $new->middle_name =  $fullname['middle_name'];
        $new->last_name = $fullname['last_name'];
        $new->qlr = $fullname['qlr'];

        $new->badge_number = $Request->badge_number;
        // $new->unit = $Request->unit;
        $new->purpose = $Request->purpose;
        $new->specific_purpose = $Request->specific_purpose;
        $new->email = $Request->email;
        $new->contact_number = $Request->contact_number;

        $rank =  $new->rank;
        $first_name = $new->first_name;
        $middle_name = $new->middle_name;
        $last_name = $new->last_name;
        $qlr = $new->qlr;

        $email = $Request->get('email');
        $data = ([
        'first_name' => $Request->get('first_name'),
        'email' => $Request->get('email'),
        ]);

        Mail::to($email)->send(new WelcomeMail($rank, $first_name,  $middle_name,  $last_name, $qlr));

        $save = $new->save();

        if($save){
          ApplicantsLog::record($new->id, 'NEW REGISTRATION', "{$new->rank} {$new->first_name} {$new->middle_name} {$new->last_name} {$new->qlr} has submitted his/her application");
          $noti = array('message' => 'Your application has been submitted successfully!','alert' => 'success');
          return response()->json($noti); 
        }else{
          $noti = array('message' => 'Failed to register','alert' => 'error');
          return response()->json($noti); 
        }
        return redirect('/');
      }
  

    
      
        
        
    }
    
    public function capitalizedRanks($checkRanks,$first_name,$middle_name,$last_name,$qlr){
      
      $highRanks = array("PGEN","PLTGEN","PMGEN","PBGEN","PCOL","PLTCOL","PMAJ","PCPT","PLT");
      if(in_array($checkRanks,$highRanks)){
        return [
          'first_name'=>strtoupper($first_name),
          'middle_name'=>strtoupper($middle_name),
          'last_name'=>strtoupper($last_name),
          'qlr'=>strtoupper($qlr),
        ];
      }
      else{
        return [
          'first_name'=>$first_name,
          'middle_name'=>$middle_name,
          'last_name'=>$last_name,
          'qlr'=>$qlr,
        ];
      }
   }
    
}