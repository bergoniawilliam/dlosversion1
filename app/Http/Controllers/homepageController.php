<?php

namespace App\Http\Controllers;
use App\useracc;
use app\usertype;
use Illuminate\Http\Request;
use Hash;
use Auth;
use Session;
use App\ActivityLogs;
use App\User;

class homepageController extends Controller
{

    public function HomePage(){
      return view('homepage');
    }
}