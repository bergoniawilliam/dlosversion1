<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        
      @page {
  size: legal landscape;
}

/* Set the content to be centered on the page (optional) */
body {
  margin: 0;
  padding: 0;
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
    .indented {
        text-indent: 4em; /* Adjust the indentation value as needed */
            
        }
       
        body {
            margin: 1cm;
            
            text-align: justify;
        }
            .DLOS {
            
            line-height: 0;
            margin-right;
        }
        .PNCO {
            
            line-height: 0;
            margin-right;
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
        table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
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
    .button-container {
    display: flex;
    justify-content: center; /* Align the buttons horizontally */
    gap: 10px; /* Add spacing between the buttons */
    margin-bottom: 10px; /* Add margin at the bottom */

  }


</style>
    @if ($results->isEmpty())
    <p>No results found.</p>
@else

<div class="header">
        
        <center><p>Republic of the Philippines</p></center>
        <center><p>NATIONAL POLICE COMMISSION</p></center>
        <h4><center><p>PHILIPPINE NATIONAL POLICE REGIONAL OFFICE 2</p></center></h4>
        <h4><center><p>REGIONAL PERSONNEL AND RECORDS MANAGEMENT DIVISION</p></center></h4>
        <center><p>Camp Marcelo A Adduru, Tuguegarao City, Cagayan</p></center>
        <br>
        <br>
    </div>
    <body>

<img src="{{asset('image/PNP LOGO.png')}}" class="logo logo-left">
<img src="{{asset('image/PRO2 LOGO.png')}}" class="logo logo-right">
<div class="content">
    <br>
    <br>
    <p class="indented">Lists of application for the period {{ (new DateTime($startDatetime))->format('F j, Y') }} to {{ (new DateTime($endDatetime))->format('F j, Y') }}.</p>
    
    <table>
        <thead>
            <tr>
                <th >Rank</th>
                <th >Full Name</th>
                <th >Budge Number</th>   
                <th >Unit</th> 
                <th >Purpose</th>  
                <th >EMAIL</Th>
                <th >Contact Number</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td>{{ $result->rank }}</td>
                    <td>{{ $result->first_name }} {{ $result->middle_name }} {{ $result->last_name }}</td>
                    <td>{{ $result->badge_number }}</td>
                    <td>{{ $result->unit }}</td>
                    <td>{{ $result->purpose }}</td>
                    <td>{{ $result->email }}</td>
                    <td>{{ $result->contact_number }}</td>
                    <td>{{ date('F j, Y', strtotime($result->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<p>Prepared by:</p><br>
<P><div class="PNCO"></P>
<p><strong>{{Auth::user()->full_name}}</strong></p>
<p>{{Auth::user()->rank}}</p>
<p>{{Auth::user()->designation}}</p>
</div>
<br>
<p>Verified by:</p><br>
<p><div class="DLOS"></p>
<p><strong><span class="input-text" contenteditable="true">CHIEF DLOS</span></strong></p>
<p><span class="input-text" contenteditable="true">Rank</span></p>
<p><span class="input-text" contenteditable="true">Designation</span>, Discipline Law and Order Section</p>
</div>
<br>
</head>
<body>
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
</body>
</html>

<script>
  document.getElementById('printButton').addEventListener('click', function() {
    window.print();
  });
</script>