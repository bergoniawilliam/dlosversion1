<DOCTYPE html>
 <html lang=”en-US”>
 <head>

    <title>DLOS | New Password </title>

    <link href="{{asset('inspinia/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    
    <!-- Sweet Alert -->
    <link href="{{asset('inspinia/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
 <body>
     
<div style="padding:50px 10px"><div class="adM">
</div><div style="max-width:600px;margin:auto"><div class="adM">
</div><div style="background:#fff;padding:15px 30px 25px 30px;border-radius:5px;text-align:center"><div class="adM">
</div>
<div><h1 style="color:black;">NEW PASSWORD</h1></div>
<div style="text-align:left">
<form action="{{route('reset.password.post')}}" method="POST">
                @csrf
                <input type="text"name="token" hidden value="{{$token}}">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="forgot_email" name="user_name" required="" placeholder="Enter email address">
                            @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" id="forgot_password" name="password" required="" placeholder="Enter New Password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required="" placeholder="Enter Confirm New Password">
                            @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>                                                                                                                       
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary block full-width m-b">Submit</button>
                    </div>
                </form>
   <center><p class="m-t">
  <small>Discipline Law and Order Section Online Clearance System</small>
    </p>
 </center>
</div>
</div>
</div>
</div>
</body>
</html>