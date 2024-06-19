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
<div><h1 style="color: red; font-style: italic;">DENIED APPLICATION!!!</h1></div>
<div style="text-align:left">
<h2>DLOS  Online Clearance System</h2>
<p>Dear Mr/Mrs <strong>{{ $rank }} {{ $first_name }} {{ $middle_name }} {{ $last_name }} {{ $qlr }}</strong></p>
<br>
<p>We are sorry to inform you that you have a pending case.
Further details will be reflected in the memorandum signed by Chief, DLOS.
You can claim your document anytime at DLOS Office.
For queries you may call 0977 1231 231 or email us at dlospro2clearance@gmail.com.</p>
<p>Reason: <strong>{{ $reason }}</strong></p>
<br>
<p>Best Regards,</p>
<p>{{ config('app.name') }}</p>
</div>
</div>
</div>
</div>
</body>
</html>