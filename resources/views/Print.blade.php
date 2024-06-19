<?php if ($applicant->reason === null && $applicant->purpose === 'Loan') { ?>

<!DOCTYPE html>
<html>
<head>
<title>{{ $applicant->rank }} {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }} {{ $applicant->badge_number }}(certification)</title>
<style>
  @page {
size: A4;

margin-left: 1.5cm;
margin-right: 1.5cm;


}

body {
text-align: justify;



}

/* Header styles */
header {


margin-left: 0.5cm;
margin-right: 0.5m;
color: #333;

}

/* Table styles */
table {
border-collapse: collapse;
width: 75%; /* Set the table width to 100% */
/* border: 0.5px solid black; */
margin-bottom: 0; /* Alisin ang margin sa ibaba */
margin-top: 0; /* Alisin ang margin sa itaas */

}

table td {
padding: 0px;
text-align: center; 
}

/* Logo and Another Image styles */
.logo, .another-image {
max-width: 100px;
max-height: 100px;

}

/* Text styles */
.text-td {
width: 100px;
text-align: center;
}

.content {
text-align: left;
margin-left: 1.2cm;
margin-right: 1.2cm;
margin-bottom: 0; /* Alisin ang margin sa ibaba */
margin-top: 0; /* Alisin ang margin sa itaas */
}

.indented {
text-indent: 4em;
}

.signatory {
line-height: 0;
margin-left: 300px;
}

.DLOS {
line-height: 0;
}

.PNCO {
line-height: 0;
}

.footer {
line-height: 0;
}

.rank {
text-transform: capitalize;
}

/* Default styling for the text input */
input[type="text"] {
border: 1px solid #ccc;
padding: 8px;
line-height: 0;
}

/* CSS media query for print */
@media print {
/* Remove border and padding for text input when printing */
input[type="text"] {
    padding: 0;
    line-height: 0;
    margin: 1cm;
}

.input-text {
    font-weight: bold;
    font-size: 16px;
    display: inline-block;
    text-transform: uppercase;
}

.input {
    text-transform: capitalize;
    font-weight: bold;
}

.date {
    margin-left: 250px;
}

#printButton {
    display: block;
}

@media print {
    #printButton {
        display: none;
    }
}

#closeButton {
    display: block;
}

@media print {
    #closeButton {
        display: none;
    }
}
}

.button {
background-color: #03adfc;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
}

.button:hover {
background-color: #0362ab;
}

.button1 {
background-color: #fc1717;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
}

.button1:hover {
background-color: #9c0505;
}

.button-container {
display: flex;
justify-content: center;
gap: 10px;
margin-bottom: 10px;
}

h4, h1, h6 {
color: black;
text-align: center;
margin: 0;
}

.content-td {
width: 400px;
}

.nowrap {
white-space: nowrap;
}

p {
color: black;
}
.sign-container {
position: relative;
text-align: right;
/* border-style: solid; */

}

.sign-center {
position: absolute;

left: 50%;
/* top: 8px;
right: 16px; */
font-size: 18px;
text-align: left;

}


.sign-image { 

left: 10px;
width: 300px;
height: 130px;

}

.sign-container-prepared {
    position: relative;
    text-align: left;
    /* border-style: solid; */
    /* border: 1px solid blue; */
}
.sign-center-prepared {
    position: absolute;

    left: 0;
    /* top: 8px;
  right: 16px; */
    font-size: 18px;
    text-align: left;
   /* border: 1px solid red; */
}
.sign-image-prepared { 

left: 10px;
width: 250px;
height: 100px;

}
.watermark {
      position: fixed;
      top: 45%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0.5; /* Adjust the opacity as needed */
      z-index: -1; /* Ensure it's behind the content */
      font-size: 80px; /* Adjust the size of the text */
      color: #ccc; /* Adjust the color of the text */
      font-weight: bold;
      font-family: Arial, sans-serif; /* Adjust the font family */
    }
</style>
</head>
<div class="watermark">Police <br>Regional<br> Office <br>2<br> DLOS <br>Clearance</div>
<header>
    <table>
        <tr>
            <td>
                <img src="image/PNP LOGO.png" alt="Logo" class="logo">
            </td>
            <td class="content-td">
                <br>
                <h6 style="text-align:center; font-family: Arial, sans-serif; font-size: 12px; font-weight: normal;">Republic of the Philippines</h6>
                <h6 style="text-align:center; font-family: Arial, sans-serif; font-size: 12px; font-weight: normal;">NATIONAL POLICE COMMISSION</h6>
                <h4 style="text-align:center; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;">PHILIPPINE NATIONAL POLICE REGIONAL OFFICE 2</h4>
                <h4 style="text-align:center; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;" class="nowrap">REGIONAL PERSONNEL AND RECORDS MANAGEMENT DIVISION</h4>
                <h6 style="text-align:center; font-family: Arial, sans-serif; font-size: 12px; font-weight: normal;">Camp Marcelo A Adduru, Tuguegarao City, Cagayan</h6>
                <br>
                <br>
            </td>
            <td>
                <img src="image/PRO2 LOGO.png" alt="Another Image" class="another-image">
            </td>
        </tr>
    </table>
   
</header>
<body>


<div class="content">
    <p style="font-family: Arial, sans-serif; margin: 0px 0;">
        <strong>PRO2 Certificate No.<strong>{{ $applicant->ctrl_no }} </strong></strong>
       &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong><span class="date">{{ strftime('%B %d, %Y', strtotime(date('Y-m-d'))) }}</span></strong>
    </p><br>
    <center><h1>C E R T I F I C A T I O N</h1></center>
    @if($applicant)
        <p style="font-family: Arial, sans-serif;"class="indented"><strong>THIS IS TO CERTIFY</strong> that <strong>{{ $applicant->rank }}</strong>

        <!-- turns uppercase or lowercase depending on the rank -->
        @if($applicant->rank === 'PLT' || 
$applicant->rank === 'PCPT' ||
$applicant->rank === 'PMAJ' ||
$applicant->rank === 'PLTCOL' ||
$applicant->rank === 'PCOL'||
$applicant->rank === 'PBGEN')
<strong> {{ strtoupper($applicant->first_name) }} {{ strtoupper($applicant->middle_name) }} {{ strtoupper($applicant->last_name) }} {{ strtoupper($applicant->qlr) }}</strong>
@else
    <strong>{{ ucwords(strtolower($applicant->first_name)) }} {{ ucwords(strtolower($applicant->middle_name)) }} {{ ucwords(strtolower($applicant->last_name)) }} {{ ucfirst(strtolower($applicant->qlr)) }}</strong>
@endif
    <strong>{{ $applicant->badge_number }}</strong>, member of this Regional Office, has 
        <strong>
            NO PENDING
        </strong> 
        administrative case filed against him/her as per available records on file with this Office
        as of this date.
    
        <p style="font-family: Arial, sans-serif;"class="indented">However, this certification shall be considered null and void if there is/are any administrative case/s found within the period of validity or in the future.</p>
        
        <p style="font-family: Arial, sans-serif;"class="indented">Issued upon request of the above-named<span id="rank" contenteditable="true">

        <!-- automatic select depending on the rank -->
        <?php echo ($applicant->rank == 'PBGEN' ||
                    $applicant->rank == 'PCOL' ||
                    $applicant->rank == 'PLTCOL' ||
                    $applicant->rank == 'PMAJ' ||
                    $applicant->rank == 'PCPT' ||
                    $applicant->rank == 'PLT') ? 'PCO' : 'PNCO'; ?>
        </span> to support his/her application for <strong>{{ $applicant->specific_purpose }}</strong>.</p>

       
        <!-- hides when the purpose is loan -->
        <?php if ($applicant->purpose !== 'Loan') { ?>
           
            <div class="signatory">
                <p style="font-family: Arial, sans-serif;"><strong><span class="input-text" contenteditable="true">MARDITO G ANGULUAN</span></strong></p>
                <p style="font-family: Arial, sans-serif;"><span class="rank" contenteditable="true">Police Colonel</span></p>
                <p style="font-family: Arial, sans-serif;"><span class="designation" contenteditable="true">Chief</span>, Regional Personnel and </p>
                <p style="font-family: Arial, sans-serif;">Records Management Division</p>
            </div>
            <p style="font-family: Arial, sans-serif;">Verified by:</p><br>
            <p style="font-family: Arial, sans-serif;"><div class="DLOS"></p>
            <p style="font-family: Arial, sans-serif;"><strong><span class="input-text" contenteditable="true">CRISANDRA B AGGABAO</span></strong></p>
            <p style="font-family: Arial, sans-serif;"><span class="rank" contenteditable="true">Police Captain</span></p>
            <p style="font-family: Arial, sans-serif;"><span class="designation" contenteditable="true">OIC</span>, Discipline Law and Order Section</p>
            </div>
        <?php } else { ?>
            <div class="sign-container">
                <img src="image/crissandra.png" alt="Cinque Terre" class="sign-image"/>
               
            <div class="sign-center"> <br><br><br>
                <strong>CRISANDRA B AGGABAO</strong><br>
                Police Captain<br>
                OIC</span>, Discipline Law and Order Section
            </div>
            </div>
           
       
        <?php } ?>
        
        <br>
        
        <P style="font-family: Arial, sans-serif;"><div class="PNCO"></P>
        <div class="sign-container-prepared">
        <?php if (Auth::user()->full_name === 'Michael Bryan A Gumaru') { ?>
            <img src="image/gumaru.png" alt="Cinque Terre" class="sign-image-prepared"/>
        <?php } elseif (Auth::user()->full_name === 'Emely B Calimag') { ?>
            <img src="image/CALIMAG.png" alt="Cinque Terre" class="sign-image-prepared"/>
            <?php } elseif (Auth::user()->full_name === 'Monina C Carpio') { ?>
            <img src="image/carpio.png" alt="Cinque Terre" class="sign-image-prepared"/>
            
        <?php } else { ?>


        <?php } ?>
        
            <div class="sign-center-prepared">
                <p style="font-family: Arial, sans-serif;">Prepared by:</p><br><br><br><br><br><br><br><br><br><br><br><br>
                <p style="font-family: Arial, sans-serif;"><strong>{{ Auth::user()->full_name }}</strong></p>
                <p style="font-family: Arial, sans-serif;">{{ Auth::user()->rank }}</p>
                <p style="font-family: Arial, sans-serif;">{{ Auth::user()->designation }}</p>
            </div>
        </div>
    </div>
    <br>

    <div class="footer">
        <strong><p style="font-family: Arial, sans-serif;">VALIDITY FROM DATE OF ISSUANCE:</p></strong>
        <p style="font-family: Arial, sans-serif;">[  ] Promotion (180 Days)</p>
        <p style="font-family: Arial, sans-serif;">[  ] Schooling (30 Days)</p>
        <p style="font-family: Arial, sans-serif;">[  ] Transfer/Reassignment/Reinstatement (45 Days)</p>
        <p style="font-family: Arial, sans-serif;">[  ] Leave Abroad/Travel Abroad (45 Days)</p>
        <p style="font-family: Arial, sans-serif;">[  ] Retirement/PRBS Requirement (180 Days)</p>
    </div>
@else
    <p style="font-family: Arial, sans-serif;">No applicant found.</p>
@endif
</div>

</div>
</body>
</html>


<?php } elseif($applicant->reason !== null && $applicant->purpose === 'Loan') { ?>


<!DOCTYPE html>
<html>
<head >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <title>{{ $applicant->rank }} {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }} {{ $applicant->badge_number }}(certification)</title>
<style>
    @page {
        size: A4;
        margin: 2;
            
    }
   
    body {
        margin: 1cm;
        
        text-align: justify;
        
        
    }
    .logo {
        width: 80px; /* Adjust the width according to your logo size */
        height: auto;
    }
    .logo-left {
        position: absolute;
        top: 30px;
        left: 20px;
    }
    .logo-right {
        position: absolute;
        top: 30px;
        right: 20px;
    }
    .content {
        text-align: justify;

    }
    .header {
        margin-left: 3px;
        margin-right: 3px; /* Adjust the margin-top value to align the content properly */
        top: 30px;
        line-height: 0;
    }

    .indented {
        text-indent: 4em; /* Adjust the indentation value as needed */
    }

    .signatory {
        
        line-height: 0;
        margin-left: 400px;
        
    }
    .DLOS {
        
        line-height: 0;
        margin-right;
    }
    .PNCO {
        
        line-height: 0;
        margin-right;
    }
    .footer {
        
        line-height: 0;
        margin-right;
      
    }
    .rank {
text-transform: capitalize;
}
         /* Default styling for the text input */
         input[type="text"] {
        border: 1px solid #ccc;
        padding: 8px;
        line-height: 0;
    }

    /* CSS media query for print */
    @media print {
        /* Remove border and padding for text input when printing */
        input[type="text"] {
            border: none;
            padding: 0;
            line-height: 0;
            margin:0;
        }
        .input-text {
    font-weight: bold;
    font-size: 16px;
    display: inline-block;
    text-transform: uppercase;
    

        }

.input {
text-transform: capitalize;
font-weight: bold;
}
.date {
        margin-left: 250px;

}
#printButton {
display: block; /* By default, the button is visible */

}

@media print {
#printButton {
display: none; /* Hide the button when printing */

}

}
#closeButton {
display: block; /* By default, the button is visible */

}

@media print {
#closeButton {
display: none; /* Hide the button when printing */

}

}

}
.button {
background-color: #03adfc;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
}
.button:hover {
background-color: #0362ab;
}
.button1 {
background-color: #fc1717;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
}
.button1:hover {
background-color: #9c0505;
}

.button-container {
display: flex;
justify-content: center; /* Align the buttons horizontally */
gap: 10px; /* Add spacing between the buttons */
margin-bottom: 10px; /* Add margin at the bottom */

}


</style>

<div class="header">
    
        <center><p>Republic of the Philippines</p></center>
        <center><p>NATIONAL POLICE COMMISSION</p></center>
        <h4><center><p>PHILIPPINE NATIONAL POLICE REGIONAL OFFICE 2</p></center></h4>
        <h4><center><p>REGIONAL PERSONNEL AND RECORDS MANAGEMENT DIVISION</p></center></h4>
        <center><p>Camp Marcelo A Adduru, Tuguegarao City, Cagayan</p></center>
        <br>
        <br>
    </div>
    <br> <br>
    <p>
<strong>PRO2 Certificate No. <span class="input-text" contenteditable="true"><strong>{{ $applicant->ctrl_no }}</strong></span></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><span class="date">
     {{ strftime('%B %d, %Y', strtotime(date('Y-m-d'))) }}
    </span></strong>
</p>

<center><h1>C E R T I F I C A T I O N</h1></center>

</head>
<body>
<img src="{{asset('image/PNP LOGO.png')}}" class="logo logo-left">
<img src="{{asset('image/PRO2 LOGO.png')}}" class="logo logo-right">
<div class="content">


@if($applicant)
<p class="indented"><strong>THIS IS TO CERTIFY</strong> that <strong>{{ $applicant->rank }}</strong>

<!-- turns uppercase or lowercase depending on the rank -->
@if($applicant->rank === 'PLT' || 
$applicant->rank === 'PCPT' ||
$applicant->rank === 'PMAJ' ||
$applicant->rank === 'PLTCOL' ||
$applicant->rank === 'PCOL'||
$applicant->rank === 'PBGEN')
    <strong> {{ strtoupper($applicant->first_name) }} {{ strtoupper($applicant->middle_name) }} {{ strtoupper($applicant->last_name) }} {{ strtoupper($applicant->qlr) }}</strong>
@else
    <strong>{{ ucwords(strtolower($applicant->first_name)) }} {{ ucwords(strtolower($applicant->middle_name)) }} {{ ucwords(strtolower($applicant->last_name)) }} {{ ucfirst(strtolower($applicant->qlr)) }}</strong>
@endif
    <strong>{{ $applicant->badge_number }}</strong>, member of this Regional Office,
has a<strong> PENDING</strong> administrative case filed against him/her {{$applicant->reason}} </p>


<p class="indented">Issued upon request of the above-named<span id="rank" contenteditable="true">

<!-- automatic select depending on the rank -->
<?php echo ($applicant->rank == 'PBGEN' ||
            $applicant->rank == 'PCOL' ||
            $applicant->rank == 'PLTCOL' ||
            $applicant->rank == 'PMAJ' ||
            $applicant->rank == 'PCPT' ||
            $applicant->rank == 'PLT') ? 'PCO' : 'PNCO'; ?>
</span> to support his/her application for <strong>{{$applicant->specific_purpose}}</strong>.</p>

<br><br><br>
<!-- hides when the purpose is loan -->
<?php if ($applicant->purpose !== 'Loan') { ?>
<div class="signatory">
<p><strong><span class="input-text" contenteditable="true" >MARDITO G ANGULUAN</span></strong></p>
<p><span class="rank" contenteditable="true" >Police Colonel</span></p>
<p><span class="designation" contenteditable="true" >Chief</span>, Regional Personnel and </p>
<p>Records Management Division</p>
</div>
<p>Verified by:</p><br>
<p><div class="DLOS"></p>
<p><strong><span class="input-text" contenteditable="true" >CRISANDRA B AGGABAO</span></strong></p>
<p><span class="rank" contenteditable="true" >Police Captain</span></p>
<p><span class="designation" contenteditable="true" >OIC</span>, Discipline Law and Order Section</p>
</div>
<?php } else { ?>
<div class="signatory">
<p><strong><span class="input-text" contenteditable="true" >CRISANDRA B AGGABAO</span></strong></p>
<p><span class="rank" contenteditable="true" >Police Captain</span></p>
<p><span class="designation" contenteditable="true" >OIC</span>, Discipline Law and Order Section</p>

</div>
<?php } ?>


<br>
<p>Prepared by:</p><br>
<P><div class="PNCO"></P>
<p><strong>{{Auth::user()->full_name}}</strong></p>
<p>{{Auth::user()->rank}}</p>
<p>{{Auth::user()->designation}}</p>
</div>
<br>

<div  class="footer">
<strong><p>VALIDITY FROM DATE OF ISSUANCE:</p></strong>
<p>[ ]Promotion (180 Days)</p>
<p>[ ]Schooling (30 Days)</p>
<p>[ ]Transfer/Reassignment/Reinstatement (45 Days)</p>
<p>[ ]Leave Abroad/Travel Abroad (45 Days)</p>
<p>[ ]Retirement/PRBS Requirement (180 Days)</p>
</div>
@else
    <p>No applicant found.</p>
@endif

<div class="button-container">
<center>
    <!-- Print button with Font Awesome icon -->
    <button class="button" id="printButton">
        <i class="fas fa-print"></i> Print
    </button>
</center>
<center>
    <!-- Close button with Font Awesome icon and onclick event -->
    <button class="button1" id="closeButton" onclick="window.location.href='{{ route('ApprovedApplicants') }}'">
        <i class="fas fa-times"></i> Close
    </button>
</center>   
</div>

</html>

<?php
$rank = $applicant->rank;
$firstName = $applicant->first_name;
$middleName = $applicant->middle_name;
$lastName = $applicant->last_name;
$qlr = $applicant->qlr;
$reason = $applicant->reason;
// turns applicant's name to all caps
if ($rank === 'PLT' || $rank === 'PLTCOL' || $rank === 'PCOL') {
$formattedRank = strtoupper($rank);
$formattedName = strtoupper($firstName) . ' ' . strtoupper($middleName) . ' ' . strtoupper($lastName);
$formattedQlr = strtoupper($qlr);
} else {
// turns every first letter into uppercase
$formattedRank = ucfirst($rank);
$formattedName = preg_replace_callback('/\b(\w)/', function($matches) {
    return strtoupper($matches[1]);
}, $firstName . ' ' . $middleName . ' ' . $lastName);
$formattedQlr = ucfirst($qlr);
}

?>

<script>
document.getElementById('printButton').addEventListener('click', function() {
window.print();
});
</script>


    <?php } elseif($applicant->reason !== null && $applicant->purpose !== 'Loan') { ?>
<!DOCTYPE html>
<html>
<head >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <title>{{ $applicant->rank }} {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }} {{ $applicant->badge_number }}(certification)</title>
<style>
    @page {
        size: A4;
        margin: 2;
            
    }
   
    body {
        margin: 1cm;
        
        text-align: justify;
        
        
    }
    .logo {
        width: 80px; /* Adjust the width according to your logo size */
        height: auto;
    }
    .logo-left {
        position: absolute;
        top: 30px;
        left: 20px;
    }
    .logo-right {
        position: absolute;
        top: 30px;
        right: 20px;
    }
    .content {
        text-align: justify;

    }
    .header {
        margin-left: 3px;
        margin-right: 3px; /* Adjust the margin-top value to align the content properly */
        top: 30px;
        line-height: 0;
    }

    .indented {
        text-indent: 4em; /* Adjust the indentation value as needed */
    }

    .signatory {
        
        line-height: 0;
        margin-left: 400px;
        
    }
    .DLOS {
        
        line-height: 0;
        margin-right;
    }
    .PNCO {
        
        line-height: 0;
        margin-right;
    }
    .footer {
        
        line-height: 0;
        margin-right;
      
    }
    .rank {
text-transform: capitalize;
}
         /* Default styling for the text input */
         input[type="text"] {
        border: 1px solid #ccc;
        padding: 8px;
        line-height: 0;
    }

    /* CSS media query for print */
    @media print {
        /* Remove border and padding for text input when printing */
        input[type="text"] {
            border: none;
            padding: 0;
            line-height: 0;
            margin:0;
        }
        .input-text {
    font-weight: bold;
    font-size: 16px;
    display: inline-block;
    text-transform: uppercase;
    

        }

.input {
text-transform: capitalize;
font-weight: bold;
}
.date {
        margin-left: 250px;

}
#printButton {
display: block; /* By default, the button is visible */

}

@media print {
#printButton {
display: none; /* Hide the button when printing */

}

}
#closeButton {
display: block; /* By default, the button is visible */

}

@media print {
#closeButton {
display: none; /* Hide the button when printing */

}

}

}
.button {
background-color: #03adfc;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
}
.button:hover {
background-color: #0362ab;
}
.button1 {
background-color: #fc1717;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
}
.button1:hover {
background-color: #9c0505;
}

.button-container {
display: flex;
justify-content: center; /* Align the buttons horizontally */
gap: 10px; /* Add spacing between the buttons */
margin-bottom: 10px; /* Add margin at the bottom */

}
</style>

<div class="header">
    
        <center><p>Republic of the Philippines</p></center>
        <center><p>NATIONAL POLICE COMMISSION</p></center>
        <h4><center><p>PHILIPPINE NATIONAL POLICE REGIONAL OFFICE 2</p></center></h4>
        <h4><center><p>REGIONAL PERSONNEL AND RECORDS MANAGEMENT DIVISION</p></center></h4>
        <center><p>Camp Marcelo A Adduru, Tuguegarao City, Cagayan</p></center>
        <br>
        <br>
    </div>
    <br> <br>
    <p>
<strong>PRO2 Certificate No. <span class="input-text" contenteditable="true"><strong>{{ $applicant->ctrl_no }}</strong></span></strong>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><span class="date">
     {{ strftime('%B %d, %Y', strtotime(date('Y-m-d'))) }}
    </span></strong>
</p>

<center><h1>C E R T I F I C A T I O N</h1></center>

</head>
<body>
<img src="{{asset('image/PNP LOGO.png')}}" class="logo logo-left">
<img src="{{asset('image/PRO2 LOGO.png')}}" class="logo logo-right">
<div class="content">


@if($applicant)
<p class="indented"><strong>THIS IS TO CERTIFY</strong> that <strong>{{ $applicant->rank }}</strong>

<!-- turns uppercase or lowercase depending on the rank -->
@if($applicant->rank === 'PLT' || 
$applicant->rank === 'PCPT' ||
$applicant->rank === 'PMAJ' ||
$applicant->rank === 'PLTCOL' ||
$applicant->rank === 'PCOL'||
$applicant->rank === 'PBGEN')
    <strong> {{ strtoupper($applicant->first_name) }} {{ strtoupper($applicant->middle_name) }} {{ strtoupper($applicant->last_name) }} {{ strtoupper($applicant->qlr) }}</strong>
@else
    <strong>{{ ucwords(strtolower($applicant->first_name)) }} {{ ucwords(strtolower($applicant->middle_name)) }} {{ ucwords(strtolower($applicant->last_name)) }} {{ ucfirst(strtolower($applicant->qlr)) }}</strong>
@endif
    <strong>{{ $applicant->badge_number }}</strong>, member of this Regional Office,
has a<strong> PENDING</strong> administrative case filed against him/her {{$applicant->reason}} </p>


<p class="indented">Issued upon request of the above-named<span id="rank" contenteditable="true">

<!-- automatic select depending on the rank -->
<?php echo ($applicant->rank == 'PBGEN' ||
            $applicant->rank == 'PCOL' ||
            $applicant->rank == 'PLTCOL' ||
            $applicant->rank == 'PMAJ' ||
            $applicant->rank == 'PCPT' ||
            $applicant->rank == 'PLT') ? 'PCO' : 'PNCO'; ?>
</span> to support his/her application for <strong>{{$applicant->specific_purpose}}</strong>.</p>

<br><br><br>
<!-- hides when the purpose is loan -->
<?php if ($applicant->purpose !== 'Loan') { ?>
<div class="signatory">
<p><strong><span class="input-text" contenteditable="true" >MARDITO G ANGULUAN</span></strong></p>
<p><span class="rank" contenteditable="true" >Police Colonel</span></p>
<p><span class="designation" contenteditable="true" >Chief</span>, Regional Personnel and </p>
<p>Records Management Division</p>
</div>
<p>Verified by:</p><br>
<p><div class="DLOS"></p>
<p><strong><span class="input-text" contenteditable="true" >CRISANDRA B AGGABAO</span></strong></p>
<p><span class="rank" contenteditable="true" >Police Captain</span></p>
<p><span class="designation" contenteditable="true" >OIC</span>, Discipline Law and Order Section</p>
</div>
<?php } else { ?>
<div class="signatory">
<p><strong><span class="input-text" contenteditable="true" >CRISANDRA B AGGABAO</span></strong></p>
<p><span class="rank" contenteditable="true" >Police Captain</span></p>
<p><span class="designation" contenteditable="true" >OIC</span>, Discipline Law and Order Section</p>

</div>
<?php } ?>


<br>
<p>Prepared by:</p><br>
<P><div class="PNCO"></P>
<p><strong>{{Auth::user()->full_name}}</strong></p>
<p>{{Auth::user()->rank}}</p>
<p>{{Auth::user()->designation}}</p>
</div>
<br>

<div  class="footer">
<strong><p>VALIDITY FROM DATE OF ISSUANCE:</p></strong>
<p>[ ]Promotion (180 Days)</p>
<p>[ ]Schooling (30 Days)</p>
<p>[ ]Transfer/Reassignment/Reinstatement (45 Days)</p>
<p>[ ]Leave Abroad/Travel Abroad (45 Days)</p>
<p>[ ]Retirement/PRBS Requirement (180 Days)</p>
</div>
@else
    <p>No applicant found.</p>
@endif

<div class="button-container">
<center>
    <!-- Print button with Font Awesome icon -->
    <button class="button" id="printButton">
        <i class="fas fa-print"></i> Print
    </button>
</center>
<center>
    <!-- Close button with Font Awesome icon and onclick event -->
    <button class="button1" id="closeButton" onclick="window.location.href='{{ route('ApprovedApplicants') }}'">
        <i class="fas fa-times"></i> Close
    </button>
</center>   
</div>

</html>

<?php
$rank = $applicant->rank;
$firstName = $applicant->first_name;
$middleName = $applicant->middle_name;
$lastName = $applicant->last_name;
$qlr = $applicant->qlr;
$reason = $applicant->reason;
// turns applicant's name to all caps
if ($rank === 'PLT' || $rank === 'PLTCOL' || $rank === 'PCOL') {
$formattedRank = strtoupper($rank);
$formattedName = strtoupper($firstName) . ' ' . strtoupper($middleName) . ' ' . strtoupper($lastName);
$formattedQlr = strtoupper($qlr);
} else {
// turns every first letter into uppercase
$formattedRank = ucfirst($rank);
$formattedName = preg_replace_callback('/\b(\w)/', function($matches) {
    return strtoupper($matches[1]);
}, $firstName . ' ' . $middleName . ' ' . $lastName);
$formattedQlr = ucfirst($qlr);
}

?>

<script>
document.getElementById('printButton').addEventListener('click', function() {
window.print();
});
</script>



<?php } else { ?>
          
<!DOCTYPE html>
<html>
<head >
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <title>{{ $applicant->rank }} {{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }} {{ $applicant->badge_number }}(certification)</title>
<style>
    @page {
        size: A4;
        margin: 2;
            
    }
   
    body {
        margin: 1cm;
        
        text-align: justify;
        
        
    }
    .logo {
        width: 80px; /* Adjust the width according to your logo size */
        height: auto;
    }
    .logo-left {
        position: absolute;
        top: 30px;
        left: 20px;
    }
    .logo-right {
        position: absolute;
        top: 30px;
        right: 20px;
    }
    .content {
        text-align: justify;

    }
    .header {
        margin-left: 3px;
        margin-right: 3px; /* Adjust the margin-top value to align the content properly */
        top: 30px;
        line-height: 0;
    }

    .indented {
        text-indent: 4em; /* Adjust the indentation value as needed */
    }

    .signatory {
        
        line-height: 0;
        margin-left: 400px;
        
    }
    .DLOS {
        
        line-height: 0;
        margin-right;
    }
    .PNCO {
        
        line-height: 0;
        margin-right;
    }
    .footer {
        
        line-height: 0;
        margin-right;
      
    }
    .rank {
text-transform: capitalize;
}
         /* Default styling for the text input */
         input[type="text"] {
        border: 1px solid #ccc;
        padding: 8px;
        line-height: 0;
    }

    /* CSS media query for print */
    @media print {
        /* Remove border and padding for text input when printing */
        input[type="text"] {
            border: none;
            padding: 0;
            line-height: 0;
            margin:0;
        }
        .input-text {
    font-weight: bold;
    font-size: 16px;
    display: inline-block;
    text-transform: uppercase;
    

        }

.input {
text-transform: capitalize;
font-weight: bold;
}
.date {
        margin-left: 250px;

}
#printButton {
display: block; /* By default, the button is visible */

}

@media print {
#printButton {
display: none; /* Hide the button when printing */

}

}
#closeButton {
display: block; /* By default, the button is visible */

}

@media print {
#closeButton {
display: none; /* Hide the button when printing */

}

}

}
.button {
background-color: #03adfc;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
}
.button:hover {
background-color: #0362ab;
}
.button1 {
background-color: #fc1717;
color: white;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
}
.button1:hover {
background-color: #9c0505;
}

.button-container {
display: flex;
justify-content: center; /* Align the buttons horizontally */
gap: 10px; /* Add spacing between the buttons */
margin-bottom: 10px; /* Add margin at the bottom */

}
</style>

<div class="header">
    
        <center><p>Republic of the Philippines</p></center>
        <center><p>NATIONAL POLICE COMMISSION</p></center>
        <h4><center><p>PHILIPPINE NATIONAL POLICE REGIONAL OFFICE 2</p></center></h4>
        <h4><center><p>REGIONAL PERSONNEL AND RECORDS MANAGEMENT DIVISION</p></center></h4>
        <center><p>Camp Marcelo A Adduru, Tuguegarao City, Cagayan</p></center>
        <br>
        <br>
    </div>
    <br> <br>
    <p>
<strong>PRO2 Certificate No. <span class="input-text" contenteditable="true"><strong>{{ $applicant->ctrl_no }}</strong></span></strong>
&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <strong><span class="date">
     {{ strftime('%B %d, %Y', strtotime(date('Y-m-d'))) }}
    </span></strong>
</p>

<center><h1>C E R T I F I C A T I O N</h1></center>

</head>
<body>
<img src="{{asset('image/PNP LOGO.png')}}" class="logo logo-left">
<img src="{{asset('image/PRO2 LOGO.png')}}" class="logo logo-right">
<div class="content">


@if($applicant)
<p class="indented"><strong>THIS IS TO CERTIFY</strong> that <strong>{{ $applicant->rank }}</strong>

<!-- turns uppercase or lowercase depending on the rank -->
@if($applicant->rank === 'PLT' || 
$applicant->rank === 'PCPT' ||
$applicant->rank === 'PMAJ' ||
$applicant->rank === 'PLTCOL' ||
$applicant->rank === 'PCOL'||
$applicant->rank === 'PBGEN')
    <strong> {{ strtoupper($applicant->first_name) }} {{ strtoupper($applicant->middle_name) }} {{ strtoupper($applicant->last_name) }} {{ strtoupper($applicant->qlr) }}</strong>
@else
    <strong>{{ ucwords(strtolower($applicant->first_name)) }} {{ ucwords(strtolower($applicant->middle_name)) }} {{ ucwords(strtolower($applicant->last_name)) }} {{ ucfirst(strtolower($applicant->qlr)) }}</strong>
@endif
    <strong>{{ $applicant->badge_number }}</strong>, member of this Regional Office,
has <strong>NO PENDING</strong> administrative case filed against him/her is/are any adminitrative case/s found within the period of validity or in thhe future.</p>


<p class="indented">Issued upon request of the above-named<span id="rank" contenteditable="true">

<!-- automatic select depending on the rank -->
<?php echo ($applicant->rank == 'PBGEN' ||
            $applicant->rank == 'PCOL' ||
            $applicant->rank == 'PLTCOL' ||
            $applicant->rank == 'PMAJ' ||
            $applicant->rank == 'PCPT' ||
            $applicant->rank == 'PLT') ? 'PCO' : 'PNCO'; ?>
</span> to support his/her application for <strong>{{$applicant->specific_purpose}}</strong>.</p>

<br><br><br>
<!-- hides when the purpose is loan -->
<?php if ($applicant->purpose !== 'Loan') { ?>
<div class="signatory">
<p><strong><span class="input-text" contenteditable="true" >MARDITO G ANGULUAN</span></strong></p>
<p><span class="rank" contenteditable="true" >Police Colonel</span></p>
<p><span class="designation" contenteditable="true" >Chief</span>, Regional Personnel and </p>
<p>Records Management Division</p>
</div>
<p>Verified by:</p><br>
<p><div class="DLOS"></p>
<p><strong><span class="input-text" contenteditable="true" >CRISANDRA B AGGABAO</span></strong></p>
<p><span class="rank" contenteditable="true" >Police Captain</span></p>
<p><span class="designation" contenteditable="true" >OIC</span>, Discipline Law and Order Section</p>
</div>
<?php } else { ?>
<div class="signatory">
<p><strong><span class="input-text" contenteditable="true" >CRISANDRA B AGGABAO</span></strong></p>
<p><span class="rank" contenteditable="true" >Police Captain</span></p>
<p><span class="designation" contenteditable="true" >OIC</span>, Discipline Law and Order Section</p>

</div>
<?php } ?>


<br>
<p>Prepared by:</p><br>
<P><div class="PNCO"></P>
<p><strong>{{Auth::user()->full_name}}</strong></p>
<p>{{Auth::user()->rank}}</p>
<p>{{Auth::user()->designation}}</p>
</div>
<br>

<div  class="footer">
<strong><p>VALIDITY FROM DATE OF ISSUANCE:</p></strong>
<p>[ ]Promotion (180 Days)</p>
<p>[ ]Schooling (30 Days)</p>
<p>[ ]Transfer/Reassignment/Reinstatement (45 Days)</p>
<p>[ ]Leave Abroad/Travel Abroad (45 Days)</p>
<p>[ ]Retirement/PRBS Requirement (180 Days)</p>
</div>
@else
    <p>No applicant found.</p>
@endif

<div class="button-container">
<center>
    <!-- Print button with Font Awesome icon -->
    <button class="button" id="printButton">
        <i class="fas fa-print"></i> Print
    </button>
</center>
<center>
    <!-- Close button with Font Awesome icon and onclick event -->
    <button class="button1" id="closeButton" onclick="window.location.href='{{ route('ApprovedApplicants') }}'">
        <i class="fas fa-times"></i> Close
    </button>
</center>   
</div>

</html>

<?php
$rank = $applicant->rank;
$firstName = $applicant->first_name;
$middleName = $applicant->middle_name;
$lastName = $applicant->last_name;
$qlr = $applicant->qlr;
$reason = $applicant->reason;
// turns applicant's name to all caps
if ($rank === 'PLT' || $rank === 'PLTCOL' || $rank === 'PCOL') {
$formattedRank = strtoupper($rank);
$formattedName = strtoupper($firstName) . ' ' . strtoupper($middleName) . ' ' . strtoupper($lastName);
$formattedQlr = strtoupper($qlr);
} else {
// turns every first letter into uppercase
$formattedRank = ucfirst($rank);
$formattedName = preg_replace_callback('/\b(\w)/', function($matches) {
    return strtoupper($matches[1]);
}, $firstName . ' ' . $middleName . ' ' . $lastName);
$formattedQlr = ucfirst($qlr);
}

?>

<script>
document.getElementById('printButton').addEventListener('click', function() {
window.print();
});
</script>

<?php } ?>


