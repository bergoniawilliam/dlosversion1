<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\applicant;

class ApplicantController extends Controller
{
    public function index(){
        $applicants = applicant::all();
        return view('addapplicant')
                ->with ('applicants', $applicants);
    }
    public function addapplicant() 
    {
     
    
}

}