<!DOCTYPE html>
<html>
<head >
    <title>CERTIFICATION</title>
    <style>
        @page {
            size: A4;
            margin: 0;
            
            
        }
       
        body {
            margin: 1cm;
            left: 20px;
            text-align: justify;
            right: 30px;
            
            
        }
        .logo {
            width: 80px; /* Adjust the width according to your logo size */
            height: auto;
        }
        .logo-left {
            position: absolute;
            top: 30px;
            left: 50px;
        }
        .logo-right {
            position: absolute;
            top: 30px;
            right: 50px;
        }
        .content {
            margin-left: 20px; /* Adjust the margin-top value to align the content properly */
            margin-right: 30px;
            text-align: justify;

        }
        .header {
            margin-left: 5px; /* Adjust the margin-top value to align the content properly */
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

             /* Default styling for the text input */
             input[type="text"] {
            border: 1px solid #ccc;
            padding: 5px;
        }

        /* CSS media query for print */
        @media print {
            /* Remove border and padding for text input when printing */
            input[type="text"] {
                border: none;
                padding: 0;
            }
        }

    </style>
   
   <div class="header">
        
            <center><p>Republic of the Philippines</p></center>
            <center><p>NATIONAL POLICE COMMISSION</p></center>
            <h4><center><p>PHILIPPINE NATIONAL POLICE REGIONAL OFFICE 2</p></center></h4>
            <h4><center><p>REGIONAL PERSONNEL AND RECORDS MANAGEMENT DIVISION</p></center></h4>
            <center><p>Camp Marcelo A Adduru, Tuguegarao City, Cagayan</p></center>
            <br>
        </div>
    <center><h1>C E R T I F I C A T I O N</h1></center>
    <br>
</head>
<body>
<img src="{{asset('image/PNP LOGO.png')}}" class="logo logo-left">
<img src="{{asset('image/PRO2 LOGO.png')}}" class="logo logo-right">
<div class="content">
    

    @foreach($data as $record)
    <p class="indented"><strong>THIS IS TO CERTIFY</strong> that <strong>{{ $record->rank }} {{ $record->first_name }} {{ $record->middle_name }} {{ $record->last_name }} {{ $record->qlr }} {{ $record->badge_number }} {{ $record->unit }}</strong>, member of this Regional Office,
    has <strong>NO PENDING</strong> administrative case filed against him/heras per available records on file with this Office
    as to this date.</p>
   
    <p class="indented">However, this certification shall be considered null and void if there is/are any administrative case/s found within the period of validity or in the future.</p>
    
    <p class="indented">Issued upon request of the above-named to support his/her application for <strong>{{$record->purpose}}</strong>.</p>
<br><br><br>
<div class="signatory">
<input type="text"  placeholder="CHIEF RPRMD"  required>
<p>Police Colonel</p>
<p>Chief, Regional Personnel and Records</p> </p>Management Division</p>
</div>
<div>

<p>Verified by:</p><br>
<div class="DLOS">
<input type="text"  placeholder="CHIEF DLOS"  required>
<p>Police Major</p>
<p>Chief, Discipline Law and Order Section</p>
</div>
<br>
<p>Prepared by:</p><br>
<div class="PNCO">
<input type="text"  placeholder="ACTION PNCO"  required>
<p>Police Master Sergeant</p>
<p>IDMIS, PNCO</p>
</div>
<br>
<div  class="footer">
<strong><p>VALIDITY FROM DATE OF ISSUANCE:</p></strong>
<p>[]Promotion (180 Days)</p>
<p>[]Schooling (30 Days)</p>
<p>[]Transfer/Reassignment/Reinstatement (45 Days)</p>
<p>[]Leave Abroad/Travel Abroad (45 Days)</p>
<p>[]Retirement/PRBS Requirement (180 Days)</p>
</div>
@endforeach
    </div>
</body>
</html>


@section('script')

<script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

<script type="text/javascript">
    
    // $(document).on('click', '.printApplicant', function(e) {
    // e.preventDefault();

    //     $.ajax({
    //         url: '/printApplicant',
    //         type: 'GET',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         success: function(response) {
    //             alert(response.message);
    //             location.reload();
    //         },
    //         error: function(error) {
    //             console.error(error);
    //             alert('Something went wrong!');
                
    //         }
    //     });
    // });



</script>

@endsection
        