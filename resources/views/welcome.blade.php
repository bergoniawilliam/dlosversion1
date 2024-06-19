@php
$januaryCount = \App\ApproveApplicant::whereMonth('created_at', '=', 1)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$februaryCount = \App\ApproveApplicant::whereMonth('created_at', '=', 2)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$marchCount = \App\ApproveApplicant::whereMonth('created_at', '=', 3)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$aprilCount = \App\ApproveApplicant::whereMonth('created_at', '=', 4)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$mayCount = \App\ApproveApplicant::whereMonth('created_at', '=', 5)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$juneCount = \App\ApproveApplicant::whereMonth('created_at', '=', 6)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$julyCount = \App\ApproveApplicant::whereMonth('created_at', '=', 7)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$augustCount = \App\ApproveApplicant::whereMonth('created_at', '=', 8)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$septCount = \App\ApproveApplicant::whereMonth('created_at', '=', 9)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$octCount = \App\ApproveApplicant::whereMonth('created_at', '=', 10)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$novCount = \App\ApproveApplicant::whereMonth('created_at', '=', 11)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
$decCount = \App\ApproveApplicant::whereMonth('created_at', '=',12)
    ->whereYear('created_at', '=', date('Y'))
    ->count();
@endphp

@extends('layout.master')


@section('title')
   DLOS CLEARANCE | Welcome

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
      #progress-container {
  position: relative;
}

.progress {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
}

#welcome-message {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
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
  .dashboard {
  background-color: #09217B; /* Replace with desired background color */
  color: white;
}
</style>

@endsection
@section('content')

<!-- Loding Spinner -->
<div id="loading-container">
    <img src="../image/loading.gif" alt="Loading icon">
  </div>


  <div class="dashboard">
  <span><h1>DLOS CLEARANCE CY-2023</h1></span>
</div>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <canvas id="bar-chart" width="50" height="10"></canvas>

    <script>
        // Get the canvas element
        var ctx = document.getElementById('bar-chart').getContext('2d');

        // Define the data for the chart
        var data = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June',
                    'July','August','September','October','November','December'],
            datasets: [{
                label: 'Number of Application/s',
                data: [
                 {{$januaryCount}},
                 {{$februaryCount}},
                 {{$marchCount}},
                 {{$aprilCount}},
                 {{$mayCount}},
                 {{$juneCount}},
                 {{$julyCount}},
                 {{$augustCount}}, 
                 {{$septCount}}, 
                 {{$octCount}},
                 {{$novCount}},
                 {{$decCount}}], // Modify the values according to your data
                backgroundColor: 'rgba(61, 181, 27)',
                borderColor: 'rgba(75, 201, 38)',
                borderWidth: 1
            }]
        };

        // Create the chart
        var chart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>

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
    <script src="script.js"></script>

     <!-- Mainly scripts -->
     <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.time.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Flot demo data -->
    <script src="js/demo/flot-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
  $('.modal').on('hidden.bs.modal', function (e) {
      if($('.modal').hasClass('in')) {
      $('body').addClass('modal-open');
      }
  });
</script>


<script>
window.addEventListener('load', function() {
setTimeout(function() {
document.getElementById('loading-container').style.display = 'none';
document.getElementById('content').style.display = 'block';
}, 1000); // Adjust the delay time in milliseconds (e.g., 2000 = 2 seconds)
});
</script>

</script>
@endsection
