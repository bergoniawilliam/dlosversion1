<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPasswordMail;
use DB;
use Carbon\Carbon;
use App\User;;
use Hash;

class ForgetPasswordManager extends Controller
{
  public function forgetPassword(){

    return view('forget-password');
  }
  public function forgetPasswordPost(Request $request)
{
  $request->validate([
    'user_name' => "required|email|exists:users",
], [
    'user_name.exists' => 'The email address does not exist.',
]);

    $token = Str::random(64);

    DB::table('password_resets')->insert([
        'user_name' => $request->user_name,
        'token' => $token,
        'created_at' => now()
    ]);

    $email = $request->get('user_name');

    Mail::to($email)->send(new ForgetPasswordMail($token, $request->user_name));

    return redirect()->route("forget.password")->with("success", "We have sent a link to your email to reset your password.");
}

  public function resetPassword($token){
    return view("new-password", compact('token'));
  }

  public function resetPasswordPost(Request $request){
    $request->validate([
        'user_name'=>"required|email|exists:users",
        'password'=>"required|min:8|confirmed",
        'password_confirmation'=> "required"
    ]);

    $updatePassword= DB::table('password_resets')
    ->where([
        "user_name"=>$request->user_name,
        "token"=>$request->token
    ])->first();

    if(!$updatePassword){
        return redirect()->to(route("reset.password"))->with("error", "Invalid");
    }

    User::where("user_name",$request->user_name)
    ->update(["password"=>Hash::make($request->password)]);

    DB::table("password_resets")->where(["user_name"=>$request->user_name])->delete();

        return redirect()->to(route('login'))->with("success", "Password reset Successfully");
  }
}
