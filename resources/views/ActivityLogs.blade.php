@extends('layout.master')

@section('title')
   DLOS | Applicants Information
@endsection

@section('css')
    <style type="text/css">
        div.dt-buttons {
            float: right;
        }
        .my-swal-container {
  z-index: 999999 !important;
}
.modal-header {
  background-color: #ADD8E6;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
        }
.hidden-input {
    display: none;
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

<!-- Loding Spinner -->
<div id="loading-container">
    <img src="../image/loading.gif" alt="Loading icon">
  </div>

<div class="ibox-content">
<div class="table-responsive">
<table class="fixed table table-striped" id="ActivityTable" >
                        <thead>
                        <tr>
                      
                        <th style="background-color: #05367C;  color: #FFFFFF;">Action</th>
                        <th style="background-color: #05367C;  color: #FFFFFF;">Details</th>
                        <th style="background-color: #05367C;  color: #FFFFFF;">Date & Time</th>
                        
                       </tr>
                      </thead>

                                      <tbody>
                                     
                                      </tbody>
                                  </table>
                              </div>          
                             </div>
                            
                    
@endsection

@section('script')

<script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">

var myTable = "";

$(document).ready(function () {
  myTable = $('#ActivityTable').DataTable({
    dom: 'Blfrtip',
    buttons: [],
    processing: true,
    pageLength: 10, // Set the number of records per page to 10
    responsive: true,
    serverSide: false,
    searching: false,
    paging: true,
    lengthMenu: [15, 25, 50, 75, 100],
    ordering: false,
    order: [[2, 'desc']],
    ajax: {
      url: "{{ route('activityLogs') }}",
      type: "post",
      data: function (d) {
        d._token = '{{ csrf_token() }}';
        d.id = $('#id').val();
        d.applicant_id = $('#applicant_id').val();
        d.action = $('#action').val();
        d.details = $('#details').val();
        d.ip_address = $('#ip_address').val();
        d.created_by = $('#created_by').val();
      },
    },
    columns: [

      { "data": "action" },
      { "data": "details" },
      {
                data: 'created_at',
                "orderable": true,
                render: function(data) {
                  return moment(data).format('MMMM D, YYYY h:mm A');
                }
            },
        ]
    });
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

@endsection