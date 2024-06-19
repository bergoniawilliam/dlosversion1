
@extends('layout.master')



@section('title')
   DLOS CLEARANCE | Dashboard
@endsection


@section('css')
    <link href="{{asset('inspinia/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/select2/select2-bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datetimepicker/datetimepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('inspinia/css/plugins/steps/jquery.steps.css') }}" type="text/css" rel="stylesheet">
    <style type="text/css">
      .middlebox h1{
        font-size: 150px;
      }
      .text-black{
        color: #0073B0 !important;
      }
      .text-black2{
        color: #3B577C !important;
        font-weight: bolder;
      }
      .container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.card-title {
  text-align: left;
}
.dashboard {
  background-color: #09217B; /* Replace with desired background color */
  color: white;
}
.card-footer a {
        color: white; /* Set the text color to white */
        /* Add any additional styling you want for the text */
    }

.card-footer a:hover {
        color: blue; /* Set the hover color to blue */
        /* Add any additional styling you want for the hover effect */
    }
    .card1 :hover {
    background-color: #022d73;
  }
  
  .card2 :hover {
    background-color: #c25c02;
  }
  
  .card3 :hover {
    background-color: #04610b;
  }
  
#loading-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #fff;
  background-color: rgba(0, 0, 0, 0.1); /* Adjust the transparency value as needed */
  z-index: 9999;
}

#loading-container img {
  width: 150px;
  height: 150px;
}

#content {
  display: block;
}

    </style>
@endsection
@section('content')
<div class="dashboard">
  <span><h1>MY DASHBOARD</h1></span>
</div>

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- loadind effects -->
<div id="loading-container">
    <img src="../image/loading.gif" alt="Loading icon">
  </div>
  @if (session('error'))
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 2000);
    </script>
@endif
<div class="row">
<div class="col-md-4 py-5">
<div class="card1  mb-3" style="background-color: #0251d1;">
      <div class="card-header" style="color: white;"><strong><h3>REQUEST FOR TODAY</h3></strong>
      <div class="container">
        <h1 class="card-title py-10 ">{{$todayApplicants}}</h1>
      <i class="fa fa-user-plus fa-5x"></i> <!-- Font Awesome icon -->
    </div>
       <p></p>
<div class="card-footer py-1">
    <strong><a href="#" class="alert-link">Total Request for Today</a></strong>
</div>
      </div>
    </div>
  </div>
  <div class="col-md-4 py-5">
  <div class="card2 mb-3" style="background-color: #fa8e2f;">
      <div class="card-header" style="color: white;"><h3>TOTAL PENDING REQUEST</h3>
        <div class="container">  
          <strong><h1 class="card-title">{{$totalApplicant}}</h1></strong>
          <i class="fa fa-hourglass-end fa-5x"></i> <!-- Font Awesome icon -->
        </div>
    <p></p>
        <div class="card-footer py-1"><strong><a href="ApplicantsData" class="alert-link ">View total pending Request</a></strong> </div>
        </div>
    </div>
  </div>
  <div class="col-md-4 py-5">
  <div class="card3 mb-3" style="background-color: #29a318;">
      <div class="card-header" style="color: white;"><h3>TOTAL APPROVED REQUEST </h3>
        <div class="container">
        <h1 class="card-title">{{$totalApprove}}</h1>
        <i class="fa fa-check-square-o fa-5x"></i> <!-- Font Awesome icon -->
        </div>
        <p></p>
        <div class="card-footer py-1"><strong> <a href="ApprovedApplicants" class="alert-link">View total Approved Request</a></strong></div>
        </div>
    </div>
  </div>
  
</div>




@endsection



@section('script')

    <script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/fullcalendar/moment.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/datetimepicker/datetimepicker.min.js')}}"></script>
    <script src="{{asset('inspinia/js/instascan.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/steps/jquery.steps.min.js')}}"></script>
    <script src="{{ asset('inspinia/js/plugins/toastr/toastr.min.js') }}"></script>


<script>

  $('.modal').on('hidden.bs.modal', function (e) {
      if($('.modal').hasClass('in')) {
      $('body').addClass('modal-open');
      }
  });

</script>

<!-- Loading Spinner -->
<script>
window.addEventListener('load', function() {
setTimeout(function() {
document.getElementById('loading-container').style.display = 'none';
document.getElementById('content').style.display = 'block';
}, 1000); // Adjust the delay time in milliseconds (e.g., 2000 = 2 seconds)
});
</script>
@endsection
