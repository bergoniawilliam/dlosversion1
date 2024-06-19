@extends('layout.master') @section('title') DLOS CLEARANCE | Approved Application @endsection @section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
<style type="text/css">
    .search-button {
        background-color: #03adfc;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    .date-input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        width: 200px;
    }
    .search-button:hover {
        background-color: #0362ab;
    }
    div.dt-buttons {
        float: right;
    }
    .modal-header {
        background-color: #05367c;
        color: white;
    }
    #loading-spinner {
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
    .search-form-container {
        padding-top: 20px;
    }
</style>
@endsection @section('content')

<!-- loadind effects -->
<div id="loading-container">
    <img src="../image/loading.gif" alt="Loading icon" />
</div>
<!-- for searching -->
<div class="ibox-content">
    @if(Auth::user()->user_type === 'ADMIN')
    <div class="text-right search-form-container">
        <form action="{{ route('search') }}" method="POST">
            @csrf
            <label for="start_datetime">From</label>
            <input class="date-input" type="datetime-local" name="start_datetime" id="start_datetime" required />

            <label for="end_datetime">To</label>
            <input class="date-input" type="datetime-local" name="end_datetime" id="end_datetime" required />

            <button class="search-button" type="submit"><i class="fas fa-print" aria-hidden="true"></i> Print</button>
        </form>
    </div>
    @endif
</div>
<!-- @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif -->

<div class="table-responsive">
    <table class="fixed table table-striped" id="approve_app_data">
        <thead>
            <tr>
                <th style="background-color: #05367c; color: #ffffff;">ID</th>
                <th style="background-color: #05367c; color: #ffffff;">Rank</th>
                <th style="background-color: #05367c; color: #ffffff;">Full Name</th>
                <th style="background-color: #05367c; color: #ffffff;">Budge Number</th>
                <th style="background-color: #05367c; color: #ffffff;">Unit</th>
                <th style="background-color: #05367c; color: #ffffff;">Purpose</th>
                <th style="background-color: #05367c; color: #ffffff;">Specific Purpose</th>
                <th style="background-color: #05367c; color: #ffffff;">EMAIL</th>
                <th style="background-color: #05367c; color: #ffffff;">Contact Number</th>
                <th style="background-color: #05367c; color: #ffffff;">Status</th>
                <th style="background-color: #05367c; color: #ffffff;">Control Number</th>
                <th style="background-color: #05367c; color: #ffffff;">Received By</th>
                <th style="background-color: #05367c; color: #ffffff;">Action</th>
            </tr>
        </thead>
    </table>
</div>

<div class="modal fade" id="PrintModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title w-100 text-center">Approved Applicant Details</h3>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: red;">&times;</span><span class="sr-only">Close</span></button>
            </div>

            <form class="m-t-lg" id="myForm" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_id">ID</label></strong>
                                <input class="form-control" name="id_applicant" id="print_id" required="" disabled />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_rank">Rank</label></strong>
                                <input type="text" class="form-control" placeholder="Rank" id="print_rank" required="" disabled />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_first_name">First Name</label></strong>
                                <input type="text" class="form-control" placeholder="First Name" id="print_first_name" required="" disabled />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_middle_name">Middle Name</label></strong>
                                <input type="text" class="form-control" placeholder="Middle Name" id="print_middle_name" required="" disabled />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_last_name">Last Name</label></strong>
                                <input type="text" class="form-control" placeholder="Last Name" id="print_last_name" required="" disabled />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_qlr">Qualifier</label></strong>
                                <input type="text" class="form-control" placeholder="Qualifier" id="print_qlr" disabled />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_badge_number">Badge Number</label></strong>
                                <input type="text" class="form-control" placeholder="Badge Number" id="print_badge_number" required="" disabled />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_unit">Unit</label></strong>
                                <input type="text" class="form-control" placeholder="Unit" id="print_unit" required="" disabled />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_purpose">Purpose</label></strong>
                                <input type="text" class="form-control" placeholder="Purpose" id="print_purpose" required="" disabled />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_specific_purpose">Specific Purpose</label></strong>
                                <input type="text" class="form-control" placeholder="Specific Purpose" id="print_specific_purpose" required="" disabled />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_email">Email</label></strong>
                                <input type="email" class="form-control" placeholder="Email" id="print_email" required="" disabled />
                                <span class="text-danger" style="color: red;">@error('email') {{$message}} @enderror </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_contact_number">Contact Number</label></strong>
                                <input type="text" class="form-control" placeholder="Contact Number" id="print_contact_number" required="" disabled />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="approve_ctrl_no">Control Number</label></strong>
                                <input type="text" class="form-control" placeholder="Control Number" id="print_ctrl_no" required="" disabled />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <strong><label for="print_received_by">Receiver Name</label></strong>
                                <input type="text" class="form-control" placeholder="Receiver Name" id="print_received_by" name = "print_received_by" required="" />
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="input-group">
                                <div class="form-group">
                                    <strong><label for="approve_status">Status</label></strong>
                                    <select class="custom-select" id="print_status" required="" disabled>
                                        <option value="">-- Select status --</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Uncleared">Uncleared</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button id="submit-button" class="saveChanges btn btn-primary">
    <span id="loading-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    <span id="button-text">Save Changes</span>
</button>

             

                    @endsection @section('script')

                    <script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
                    <script src="{{asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <style>
        .swal2-container {
            z-index: 999999 !important;
        }
    </style>
                    <script type="text/javascript">
                        /////

                        ////
                        var myTable = "";

                        $(document).ready(function () {
                            myTable = $("#approve_app_data").DataTable({
                                processing: true,
                                pageLength: 10,
                                responsive: true,
                                serverSide: false,
                                searching: false,
                                paging: true,
                                lengthMenu: [15, 25, 50, 75, 100],
                                ordering: false,
                                ajax: {
                                    url: "approvedApplicants",
                                    type: "POST",
                                    dataType: "json",
                                    data: function (d) {
                                        d._token = "{{ csrf_token() }}";
                                        d.id = $("#id").val();
                                        d.rank = $("#rank").val();
                                        d.first_name = $("#first_name").val();
                                        d.middle_name = $("#middle_name").val();
                                        d.last_name = $("#last_name").val();
                                        d.qlr = $("#qlr").val();
                                        d.badge_number = $("#badge_number").val();
                                        d.unit = $("#unit").val();
                                        d.purpose = $("#purpose").val();

                                        d.specific_purpose = $("#specific_purpose").val();
                                        d.email = $("#email").val();
                                        d.contact_number = $("#contact_number").val();
                                        d.ctrl_no = $("#ctrl_no").val();

                                        d.received_by = $("#received_by").val();
                                        d.status = $("#status").val();
                                    },
                                },

                                columns: [
                                    { data: "id" },
                                    { data: "rank" },
                                    {
                                        data: null,
                                        render: function (data, type, row) {
                                            var name = row.first_name;

                                            if (row.middle_name !== null && row.middle_name !== "") {
                                                name += " " + row.middle_name;
                                            }

                                            if (row.last_name !== null) {
                                                name += " " + row.last_name;
                                            }

                                            if (row.qlr !== null) {
                                                name += " " + row.qlr;
                                            }

                                            return name;
                                        },
                                    },
                                    { data: "badge_number" },
                                    { data: "unit" },
                                    { data: "purpose" },
                                    { data: "specific_purpose" },

                                    { data: "email" },
                                    { data: "contact_number" },
                                    {
                                        data: "status",
                                        render: function (data, type, row) {
                                            if (data === "Approved") {
                                                return '<span class="badge bg-primary">Approved</span>';
                                            } else if (data === "Uncleared") {
                                                return '<span class="badge bg-danger">Uncleared</span>';
                                            } else {
                                                return '<span class="badge bg-warning">Pending</span>';
                                            }
                                        },
                                    },
                                    { data: "ctrl_no" },
                                    { data: "received_by" },

                                    { data: "action" },
                                ],
                            });
                        });

                        $(document).on("click", ".PrintModal_view", function (e) {
                            e.preventDefault();

                            var id = $(this).data("id");
                            $("#print_id").val(id);

                            var rank = $(this).data("rank");
                            $("#print_rank").val(rank);

                            var first_name = $(this).data("first_name");
                            $("#print_first_name").val(first_name);

                            var middle_name = $(this).data("middle_name");
                            $("#print_middle_name").val(middle_name);

                            var last_name = $(this).data("last_name");
                            $("#print_last_name").val(last_name);

                            var qlr = $(this).data("qlr");
                            $("#print_qlr").val(qlr);

                            var badge_number = $(this).data("badge_number");
                            $("#print_badge_number").val(badge_number);

                            var unit = $(this).data("unit");
                            $("#print_unit").val(unit);

                            var purpose = $(this).data("purpose");
                            $("#print_purpose").val(purpose);

                            var specific_purpose = $(this).data("specific_purpose");
                            $("#print_specific_purpose").val(specific_purpose);
                            var email = $(this).data("email");
                            $("#print_email").val(email);

                            var contact_number = $(this).data("contact_number");
                            $("#print_contact_number").val(contact_number);

                            var status = $(this).data("status");
                            $("#print_status").val(status);

                            var ctrl_no = $(this).data("ctrl_no");
                            $("#print_ctrl_no").val(ctrl_no);

                            var received_by = $(this).data("received_by");
                            $("#print_received_by").val(received_by);

                            $("#PrintModal").modal("show");
                        });

                        var id = $("#print_id").val();
                        var data = {
                            id: id,
                            rank: $("#print_rank").val(),
                            first_name: $("#print_first_name").val(),
                            middle_name: $("#print_middle_name").val(),
                            last_name: $("#print_last_name").val(),
                            qlr: $("#print_qlr").val(),
                            badge_number: $("#print_badge_number").val(),
                            unit: $("#print_unit").val(),
                            purpose: $("#print_purpose").val(),
                            email: $("#print_email").val(),
                            contact_number: $("#print_contact_number").val(),
                            specific_purpose: $("#print_specific_purpose").val(),
                            received_by: $("#print_received_by").val(),
                            ctrl_no: $("#print_ctrl_no").val(),
                            status: $("#print_status").val(),
                        };

                        $.ajaxSetup({
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                            },
                        });
                        /////
                        $(document).on("click", "#submit-button", function (e) {
                         e.preventDefault();

                        var id= $('#print_id').val();
                        var received_by = $("#print_received_by").val();
                       
                        // console.log(id);
    // Check other form fields for validation here...
    
    if ($("#print_received_by").val() == "") {
        Swal.fire({
            icon: "warning",
            title: "Warning",
            text: "Receiver Name is required!",
            customClass: {
                container: "my-swal-container",
            },
        });
        return false;
    }

    Swal.fire({
        title: "Are you sure you want to save changes?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Save it!",
        customClass: {
            container: "my-swal-container",
        },
    }).then((result) => {
        if (result.isConfirmed) {
            // Show the loading spinner and update the button text
            $('#loading-spinner').show();
            $('#button-text').text('Saving...');

            // Disable the button to prevent multiple submissions
            $('.saveChanges').prop('disabled', true);
         
            // Simulate an asynchronous request (you would replace this with your actual submission logic)
            $.ajax({
                url: "/sharp/" + id,
                method:"PUT",
                data: {
                        received_by:received_by
                },
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
        // Handle success response here
                console.log(response.success);
                  
                    if (response.success){
                      Swal.fire({
                            title: "Success!",
                            text: "Your changes have been saved.",
                            icon: "success",
                            customClass: {
                                container: "my-swal-container",
                            },
                      });
                      myTable.ajax.reload();
                      $('#PrintModal').modal('hide');
                   }else{
                      Swal.fire({
                          title: "Error!",
                          text: "Error on Updating Data",
                          icon: "error",
                      });
                   }
                }
                    
            })
            .always(function () {
                // Enable the button
                $('.saveChanges').prop('disabled', false);

                // Hide the loading spinner and update the button text
                $('#loading-spinner').hide();
                $('#button-text').text('Save Changes');
            });
            // console.log(received_by);
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Handle the case when the user clicks "Cancel" and does not save the data
            Swal.fire({
                title: "Changes discarded",
                text: "Your changes have not been saved.",
                icon: "info",
                customClass: {
                    container: "my-swal-container",
                },
            });
        }
        
    });
});


                        // end update modal
                    </script>

                    <!-- Loading Spinner -->
                    <script>
                        window.addEventListener("load", function () {
                            setTimeout(function () {
                                document.getElementById("loading-container").style.display = "none";
                                document.getElementById("content").style.display = "block";
                            }, 1000); // Adjust the delay time in milliseconds (e.g., 2000 = 2 seconds)
                        });
                    </script>
                    <script>
                        function saveApplication() {
                          // Show the loading spinner and update the button text
                          document.getElementById('loading-spinner').style.display = 'inline-block';
                          document.getElementById('button-text').innerText = 'Saving...';

                          // Simulate an asynchronous request (you would replace this with your actual submission logic)
                          setTimeout(function() {
                            // Enable the button


                            // Hide the loading spinner and update the button text
                            document.getElementById('loading-spinner').style.display = 'none';
                            document.getElementById('button-text').innerText = 'Save Changes';

                          }, 4000); // Simulate a 2-second delay for demonstration purposes
                  }
                   </script>
                   <!-- <script>
    // Check if the success message exists
    @if(session('success'))
        // Show pop-up with the success message
        alert("{{ session('success') }}");
    @endif
</script> -->

@if(session('success'))
    <script>
        // Show pop-up with success message
        alert("{{ session('success') }}");
    </script>
@endif

                    @endsection
               
            </div>
        </div>
    </div>
</div>
