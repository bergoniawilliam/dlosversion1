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
use App\ApplicantsData;
use App\ApproveApplicant;
use App\AdminUser;

class UserController extends Controller
{

    public function welcome(Request $r){
      return view('welcome');
    }


    public function adduser(Request $Request) 
    {
        $checkemail = User::where('user_name',$Request->email)->first();
        $user = Auth::user()->full_name;
        
        if($checkemail){
            $notif = array('message' => 'Email already in use','alert' => 'error');
            return response()->json($notif); 
        
        }

        $new = new User();
        $new->user_name = $Request->email;
        $new->password = Hash::make($Request->password);
        $new->rank = $Request->rank;
        $new->full_name = $Request->full_name;
        $new->designation = $Request->designation;
        $new->user_type = $Request->user_type;
        $new->status = 'Active';
        $save = $new->save();

        if($save){
          ActivityLogs::record(Auth::user()->id, 'ADD USER', "{$user} has added new user");
          $notif = array('message' => 'User added Successfully ','alert' => 'success');
          return response()->json($notif); 
        }else{
          $notif = array('message' => 'Failed to add user','alert' => 'error');
          return response()->json($notif); 
        }
        return redirect('/AdminUser');  
    }


    public function fogotpassword(Request $request)
{
    $user = User::where('user_name', $request->forgot_email)->first();

    if (!$user) {
        $notif = array('message' => 'Username does not exist', 'alert' => 'error');
        return response()->json($notif);
    }

    $update = $user->update([
        'password' => Hash::make($request->forgot_password),
    ]);

    if ($update) {
        $notif = array('message' => 'Successfully saved', 'alert' => 'success');
    } else {
        $notif = array('message' => 'Failed to save', 'alert' => 'error');
    }

    return response()->json($notif);
}
    public function edit(Request $Request) {

        useracc::where('id_user',$Request->id_user)->update([
                    'user_name'=>$Request->user_name,
                    'password'=>$Request->password,
                    'name'=>$Request->name,
                    'station'=>$Request->station,
                    'user_type'=>$Request->user_type,
                   
        ]);
        return 'success';
    }


public function postLogin(Request $r){

        date_default_timezone_set('Asia/Manila');
  
        if (Auth::attempt(['user_name' => $r->email, 'password' => $r->password])) {
          $user = Auth::user();
          $login = Auth::user()->full_name;
          if ($user->status == 'Active') {
              if (!empty($user->deleted_at)) {
                  $notif = array(
                      'title' => "Invalid User",
                      'message' => 'Account Deactivated! You can contact the Administrator.',
                      'alerttype' => 'warning'
                  );
              } else {
                  ActivityLogs::record(Auth::user()->id, 'LOGIN', "{$login} has login");
                  return redirect()->route('welcome');
              }
          } else if ($user->status === 'Deactivated') {
              $notif = array(
                  'title' => "Invalid User",
                  'message' => 'Account deactivated! You can contact the Administrator.',
                  'alerttype' => 'warning'
              );
              Auth::logout(); // Log out the user
            } else if ($user->status === null) {
              $notif = array(
                  'title' => "Invalid User",
                  'message' => 'Account not yet activated! Please contact your administrator.',
                  'alerttype' => 'warning'
              );
              Auth::logout(); // Log out the user
          }
      } else {
          $notif = array(
              'title' => "Invalid User",
              'message' => 'Access Denied! Wrong username or password.',
              'alerttype' => 'warning'
          );
      }
      
      return redirect()->back()->with($notif);

}
    public function logout(){

      date_default_timezone_set('Asia/Manila');
      $logout = Auth::user()->full_name;
      ActivityLogs::record(Auth::user()->id,'LOGOUT', "{$logout} has logout");
      Auth::logout();
      Session::flush();
      return redirect()->route('login');
    }


public function show(Request $r){
$data = User::all();
$totalRecords = User::count();
$totalFiltered = $totalRecords;
$newData = array(); $i=0;// Define $newData here
                            
 foreach ($data as $d):
                         
 $dq =  User::where('id',$d->id)->orderBy('created_at','desc')->first();
 $datatransactcount =  User::where('id',$d->id)->orderBy('created_at','desc')->count();


$btns =     '<button data-toggle="dropdown" class="btn btn-success btn-outline dropdown-toggle" type="button">Action </button>
                <ul class="dropdown-menu">';
if ($d->user_type === 'User') {
$btns .= '  <li><a class="EditUserModal"
     data-id="'.$d->id.'" 
     data-rank="'.$d->rank.'"
     data-full_name="'.$d->full_name.'" 
     data-designation="'.$d->designation.'"
     data-user_type="'.$d->user_type.'"
     data-status="'.$d->status.'">Edit Profile</a></li>';
   
$btns .= '  <li><a class="exampleModal" data-toggle="modal" data-target="#exampleModal"
    data-id="'.$d->id.'" 
    data-user_name="'.$d->user_name.'" 
    data-password="'.$d->password.'" >Change Email/Password</a></li>';
     $btns .= '</ul>';
    }  
                                
       $newData[$i] = array(
             'no'=>$i+1+$r->input('start'),
             'id' => $d->id,
             'user_name' => $d->user_name,
             'password' => $d->password,
             'rank' => $d->rank,
             'full_name' => $d->full_name,
             'designation' => $d->designation,
             'user_type' => $d->user_type,
             'status' => $d->status,
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

 public function index(){
        $admin_user = User::all();
        return view('AdminUser')
                ->with ('admin_user', $admin_user);

}

public function update(Request $request, $id)
{

  date_default_timezone_set('Asia/Manila');
    $user = User::find($id);
    $editorname = Auth::user()->full_name;
    
    if($user)
    { 
      $user->rank = $request->input('rank');
      $user->full_name = $request->input('full_name');
      $user->designation = $request->input('designation');
      $user->user_type = $request->input('user_type');
      $user->status = $request->input('status');
      
      $save=$user->update();

      if($save){
        ActivityLogs::record($user->id, 'UPDATED USER PROFILE',"{$editorname} updated the profile of " .$user->full_name);
        $notif = array('message' => 'User updated Successfully ','alert' => 'success');
        return response()->json($notif); 
      }else{
        $notif = array('message' => 'Failed to save update','alert' => 'error');
        return response()->json($notif); 
      }
      return redirect('/AdminUser');
      
    }
    
  }

  public function updatePassword(Request $request, $id)
  {
    date_default_timezone_set('Asia/Manila');
      $user = User::find($id);
      $editorname = Auth::user()->full_name;
      if($user)
      {
        
        $user->user_name = $request->input('user_name');
        $user->password = Hash::make($request->input('password'));
       
        
        $save=$user->update();
  
        if($save){
          ActivityLogs::record($user->id, 'UPDATED USER PASSWORD',"{$editorname} updated the password of " .$user->full_name);
          $notif = array('message' => 'Password updated Successfully ','alert' => 'success');
          return response()->json($notif); 
        }else{
          $notif = array('message' => 'Failed to save update','alert' => 'error');
          return response()->json($notif); 
        }
        return redirect('/AdminUser');
        
      }
      
    }

}
