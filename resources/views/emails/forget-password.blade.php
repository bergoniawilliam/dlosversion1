<DOCTYPE html>
 <html lang=”en-US”>
 <head>
 <meta charset=”utf-8”>
 </head>
 <body>
     
<div style="background:#CE1503;padding:50px 10px"><div class="adM">
</div><div style="max-width:600px;margin:auto"><div class="adM">
</div><div style="background:#fff;padding:15px 30px 25px 30px;border-radius:5px;text-align:center"><div class="adM">
</div>
<div><h1 style="color: red; font-style: italic;">RESET PASSWORD!!!</h1></div>
<div style="text-align:left">
<h2>DLOS  Online Clearance System</h2>

<p>Please click the button below to reset your password.</p>
<br>
<a href="{{route('reset.password',$token)}}" style="display: inline-block; background-color: #4CAF50; color: white; padding: 10px 20px; text-align: center; text-decoration: none; border-radius: 5px;">Reset Password</a>
<br>
<br>
<p>Best Regards,</p>
<p>{{ config('app.name') }}</p>
</div>
</div>
</div>
</div>
</body>
</html>