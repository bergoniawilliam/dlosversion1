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
            background-color: #05367C;
            color: white;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .fixed {
            table-layout: fixed;
            width: 100%;
        }

        .fixed td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        <style>th {
            background-color: #05367C;
            /* Set your desired background color here */
        }

        table.fixed {
            table-layout: auto;
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
            background-color: rgba(0, 0, 0, 0.1);
            /* Adjust the transparency value as needed */
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
            background-color: #09217B;
            /* Replace with desired background color */
            color: white;
        }

        table caption {
            caption-side: top;
            font-weight: bold;
            text-align: center;
            /* Add any other styles you want for the caption */
        }

        /* Ensure the caption is centered above the table */
        .table-container {
            text-align: center;
            overflow-x: auto;
        }
    </style>
    <style>
    /* Hide the first column containing IDs */
    th:nth-child(1),
    td:nth-child(1) {
        display: none;
    }
</style>
@endsection

@section('content')
    <div class="ibox-content">
        <div class="text-right"></div>
        <div class="table-responsive">
            <div class="table-container">
                <table class="fixed table table-striped" id="id_tbl">
                    <colgroup>
                        <col style="width:auto;">
                        <col style="width:auto;">
                        <col style="width:auto;">
                        <col style="width:auto;">
                        <col style="width:auto;">
                        <col style="width:auto;">
                        <col style="width:auto;">
                        <col style="width:auto;">
                        <col style="width:auto;">
                        <col style="width:auto;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th style="background-color: #05367C;  color: #FFFFFF;">ID</th>
                            <th style="background-color: #05367C; color: #FFFFFF;">Rank</th>
                            <th style="background-color: #05367C; color: #FFFFFF;">Full Name</th>
                            <th style="background-color: #05367C; color: #FFFFFF;">Badge Number</th>
                            <!-- <th style="background-color: #05367C; color: #FFFFFF;">Unit</th> -->
                            <th style="background-color: #05367C; color: #FFFFFF;">Purpose</th>
                            <th style="background-color: #05367C; color: #FFFFFF;">specific_purpose</th>
                            <th style="background-color: #05367C; color: #FFFFFF;">EMAIL</th>
                            <th style="background-color: #05367C; color: #FFFFFF;">Contact Number</th>
                            <th style="background-color: #05367C; color: #FFFFFF;">Status</th>
                            <th style="background-color: #05367C; color: #FFFFFF;">Reason</th>
                            <th style="background-color: #05367C; color: #FFFFFF;">Control Number</th>
                            <th style="background-color: #05367C; color: #FFFFFF;">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- loadind effects -->
    <div id="loading-container">
        <img src="../image/loading.gif" alt="Loading icon">
    </div>

    <!-- Update/Edit/Approve Applicants Modal -->
    <div class="modal fade" id="ApproveApplicantModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">APPLICANT's DETAILS</h3>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"
                            style="color: red;">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form class="m-t-lg" id="myForm" method="post">
                        @csrf

                        <!-- Input Trappings   -->
                        <div class="alert alert-danger" role="alert" id="mobileErrorMessage" style="display: none;">
                            Invalid input. Numbers only!
                        </div>
                        <div class="alert alert-danger" role="alert" id="badge_numberMessage" style="display: none;">
                            Invalid input. Numbers only!
                        </div>
                        <div class="alert alert-danger" role="alert" id="warningMessage" style="display: none;">
                            Invalid input. Letters only!
                        </div>
                        <div class="alert alert-danger" role="alert" id="M_NameMessage" style="display: none;">
                            Invalid input. Letters only!
                        </div>
                        <div class="alert alert-danger" role="alert" id="L_NameMessage" style="display: none;">
                            Invalid input. Letters only!
                        </div>
                        <div class="alert alert-danger" role="alert" id="QlrMessage" style="display: none;">
                            Invalid input. Letters only!
                        </div>
                        <!-- <div class="alert alert-danger" role="alert" id="UnitMessage" style="display: none;">
                            Invalid input. Letters only!
                        </div> -->
                        <div class="alert alert-danger" role="alert" id="purposeMessage" style="display: none;">
                            Invalid input. Letters only!
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_id">ID</label></strong>
                                        <input type="text" class="form-control" name="id_applicant" id="approve_id"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_rank">Rank</label></strong>
                                        <div class="input-group">
                                            <select class="custom-select" id="approve_rank" required>
                                                <option value="">-- Select Rank--</option>
                                <option value="PBGEN">PBGEN</option>
                                <option value="PCOL">PCOL</option>
                                <option value="PLTCOL">PLTCOL</option>
                                <option value="PMAJ">PMAJ</option>
                                <option value="PCPT">PCPT</option>
                                <option value="PLT">PLT</option>
                                <option value="PEMS">PEMS</option>
                                <option value="PCMS">PCMS</option>
                                <option value="PSMS">PSMS</option>
                                <option value="PMSg">PMSg</option>
                                <option value="PSSg">PSSg</option>
                                <option value="PCpl">PCpl</option>
                                <option value="Pat">Pat</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_first_name">First Name</label></strong>
                                        <input type="text" class="form-control" placeholder="First Name"
                                            id="approve_first_name" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_middle_name">Middle Name</label></strong>
                                        <input type="text" class="form-control" placeholder="Middle Name"
                                            id="approve_middle_name" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_last_name">Last Name</label></strong>
                                        <input type="text" class="form-control" placeholder="Last Name"
                                            id="approve_last_name" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_qlr">Qualifier</label></strong>
                                        <input type="text" class="form-control" placeholder="Qualifier"
                                            id="approve_qlr">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_badge_number">Badge Number</label></strong>
                                        <input type="text" class="form-control" placeholder="Badge Number"
                                            id="approve_badge_number" required>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_unit">Unit</label></strong>
                                        <input type="text" class="form-control" placeholder="Unit" id="approve_unit"
                                            required>
                                    </div>
                                </div> -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_purpose">Purpose</label></strong>
                                        <input type="text" class="form-control" placeholder="Purpose"
                                            id="approve_purpose" required>
                                    </div>
                                </div>
                                <!-- //// -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_specific_purpose">Specific Purpose</label></strong>
                                        <input type="text" class="form-control" placeholder="Specific Purpose"
                                            id="approve_specific_purpose" required>
                                    </div>
                                </div>

                                <!-- //// -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_email">Email</label></strong>
                                        <input type="email" class="form-control" placeholder="Email"
                                            id="approve_email" required="" disabled>
                                        <span class="text-danger" style="color:red">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_contact_number">Contact Number</label></strong>
                                        <input type="text" class="form-control" placeholder="Contact Number"
                                            id="approve_contact_number" required>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <strong><label for="approve_status">Status</label></strong>
                                        <div class="input-group">
                                            <select class="custom-select" id="approve_status" onchange="checkStatus()"
                                                required>
                                                <option value="">-- Select status --</option>
                                                <option value="Approved" onclick="clearTextarea()">Approved</option>
                                                <option value="Uncleared">Uncleared</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <!-- <strong><label for="approve_control_number">Control Number</label></strong> -->
                                        <input type="hidden" class="form-control" placeholder="Control Number"
                                            id="approve_control_number" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div id="reason_container" style="display: none;">
                                        <div class="form-group">
                                            <strong><label for="reason">Reason</label></strong>
                                            <textarea class="form-control" id="reason" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                </div>
                </form>
                <div class="modal-footer " style="text-center">
                    <button id="submit-button" class=" saveChanges btn btn-primary" onclick="saveApplication()">
                        <span id="loading-spinner" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                        <span id="button-text">Save Changes</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Move Approved Modal -->
    <div class="modal fade" id="MoveApproveModal" role="dialog" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Approved Applicant</h3>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"
                            style="color: red;">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <form class="m-t-lg" id="MoveForm" method="post">

                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_id">ID</label></strong>
                                    <input type="text" class="form-control" name="id_applicant" id="move_id"
                                        required="" disabled>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_rank">Rank</label></strong>
                                    <div class="input-group">
                                        <select class="custom-select" id="move_rank" required>
                                            <option value="">-- Select Rank--</option>
                                            <option value="PBGEN">PBGEN</option>
                                            <option value="PCOL">PCOL</option>
                                            <option value="PLTCOL">PLTCOL</option>
                                            <option value="PMAJ">PMAJ</option>
                                            <option value="PCPT">PCPT</option>
                                            <option value="PLT">PLT</option>
                                            <option value="PEMS">PEMS</option>
                                            <option value="PCMS">PCMS</option>
                                            <option value="PSMS">PSMS</option>
                                            <option value="PMSg">PMSg</option>
                                            <option value="PSSg">PSSg</option>
                                            <option value="PCpl">PCpl</option>
                                            <option value="Pat">Pat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_first_name">First Name</label></strong>
                                    <input type="text" class="form-control" placeholder="First Name"
                                        id="move_first_name" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_middle_name">Middle Name</label></strong>
                                    <input type="text" class="form-control" placeholder="Middle Name"
                                        id="move_middle_name" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_last_name">Last Name</label></strong>
                                    <input type="text" class="form-control" placeholder="Last Name"
                                        id="move_last_name" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_qlr">Qualifier</label></strong>
                                    <input type="text" class="form-control" placeholder="Qualifier" id="move_qlr">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_badge_number">Badge Number</label></strong>
                                    <input type="text" class="form-control" placeholder="Badge Number"
                                        id="move_badge_number" required>
                                </div>
                            </div>
                            <!-- <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_unit">Unit</label></strong>
                                    <input type="text" class="form-control" placeholder="Unit" id="move_unit"
                                        required>
                                </div>
                            </div> -->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_purpose">Purpose</label></strong>
                                    <input type="text" class="form-control" placeholder="Purpose" id="move_purpose"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_specific_purpose">Specific Purpose</label></strong>
                                    <input type="text" class="form-control" placeholder="Specific Purpose"
                                        id="specific_purpose" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_email">Email</label></strong>
                                    <input type="email" class="form-control" placeholder="Email" id="move_email"
                                        required="" disabled>
                                    <span class="text-danger" style="color:red">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_contact_number">Contact Number</label></strong>
                                    <input type="text" class="form-control" placeholder="Contact Number"
                                        id="move_contact_number" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <!-- <strong><label for="move_ctrl_no">Control Number</label></strong> -->
                                    <input type="hidden" class="form-control" placeholder="Control Number"
                                        id="move_ctrl_no" required>
                                </div>
                            </div>
                            <div  class="col-sm-4">
                                <div id="reason_container" class="form-group">
                                    <strong><label for="move_reason">Reason</label></strong>
                                    <input type="text" class="form-control" placeholder="" id="move_reason" required="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <strong><label for="move_status">Status</label></strong>
                                    <div class="input-group">
                                        <select class="custom-select" id="move_status" required="">
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
                    <button id="submit-button" class=" approvedData btn btn-primary" onclick="submitApplication()">
                        <span id="loading-spinners" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                        <span id="button-text1">Release</span>
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('inspinia/js/plugins/dataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        var myTable = "";

        $(document).ready(function() {
            myTable = $('#id_tbl').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ],
                processing: true,
                pageLength: 10,
                responsive: true,
                serverSide: false,
                searching: false,
                paging: true,
                lengthMenu: [15, 25, 50, 75, 100],
                ordering: false,
                ajax: {
                    url: "{{ route('applicantsData') }}",
                    type: "post",
                    data: function(d) {
                        d._token = '{{ csrf_token() }}';
                        d.id = $('#id').val();
                        d.rank = $('#rank').val();
                        d.first_name = $('#first_name').val();
                        d.middle_name = $('#middle_name').val();
                        d.last_name = $('#last_name').val();
                        d.qlr = $('#qlr').val();
                        d.badge_number = $('#badge_number').val();
                        // d.unit = $('#unit').val();
                        d.purpose = $('#purpose').val();
                        d.specific_purpose = $('#specific_purpose').val();

                        d.email = $('#email').val();
                        d.contact_number = $('#contact_number').val();
                        d.status = $('#status').val();
                        d.reason = $('#reason').val();
                        d.ctrl_no = $('#ctrl_no').val();
                       
                    },
                },
                columns: [{
                        data: "id"
                    },
                    {
                        data: "rank"
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            var name = row.first_name;

                            if (row.middle_name !== null && row.middle_name !== '') {
                                name += ' ' + row.middle_name;
                            }

                            if (row.last_name !== null) {
                                name += ' ' + row.last_name;
                            }

                            if (row.qlr !== null) {
                                name += ' ' + row.qlr;
                            }

                            return name;
                        }
                    },
                    {
                        data: "badge_number"
                    },
                    // {
                    //     data: "unit"
                    // },
                    {
                        data: "purpose"
                    },

                    {
                        data: "specific_purpose"
                    },
                    {
                        data: "email"
                    },
                    {
                        data: "contact_number"
                    },
                    {
                        data: "status",
                        render: function(data, type, row) {
                            if (data === "Approved") {
                                return '<span class="badge bg-primary">Approved</span>';
                            } else if (data === "Uncleared") {
                                return '<span class="badge bg-danger">Uncleared</span>';
                            } else {
                                return '<span class="badge bg-warning">Pending</span>';
                            }
                        }
                    },
                    {
                        data: "reason"
                    },
                    {
                        data: "ctrl_no"
                    },
                    {
                        data: "action"
                    },
                ]
            });
          
        });




        $(document).on('click', '.applicantID', function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            $('#view_id').val(id);

            var rank = $(this).data('rank');
            $('#view_rank').val(rank);

            var first_name = $(this).data('first_name');
            $('#view_first_name').val(first_name);

            var middle_name = $(this).data('middle_name');
            $('#view_middle_name').val(middle_name);

            var last_name = $(this).data('last_name');
            $('#view_last_name').val(last_name);

            var qlr = $(this).data('qlr');
            $('#view_qlr').val(qlr);

            var badge_number = $(this).data('badge_number');
            $('#view_badge_number').val(badge_number);

            // var unit = $(this).data('unit');
            // $('#view_unit').val(unit);

            var purpose = $(this).data('purpose');
            $('#view_purpose').val(purpose);

            var specific_purpose = $(this).data('specific_purpose');
            $('#view_specific_purpose').val(specific_purpose);

            var email = $(this).data('email');
            $('#view_email').val(email);

            var contact_number = $(this).data('contact_number');
            $('#view_contact_number').val(contact_number);

            var status = $(this).data('status');
            $('#view_status').val(status);

            var ctrl_no = $(this).data('ctrl_no');
            $('#view_ctrl_no').val(ctrl_no);

            if(status === 'Approved') {
            $('#reason_container').hide();
            } else {
            $('#reason_container').show();
            }
           

            $('#applicantModal').modal('show');

            
        });


        // Update Modal
        $(document).on('click', '.ApproveApplicantModal', function(e) {
            e.preventDefault();

            id = $(this).data('id');
            $('#approve_id').val(id);

            var rank = $(this).data('rank');
            $('#approve_rank').val(rank);

            var first_name = $(this).data('first_name');
            $('#approve_first_name').val(first_name);

            var middle_name = $(this).data('middle_name');
            $('#approve_middle_name').val(middle_name);

            var last_name = $(this).data('last_name');
            $('#approve_last_name').val(last_name);

            var qlr = $(this).data('qlr');
            $('#approve_qlr').val(qlr);

            var badge_number = $(this).data('badge_number');
            $('#approve_badge_number').val(badge_number);

            // var unit = $(this).data('unit');
            // $('#approve_unit').val(unit);

            var purpose = $(this).data('purpose');
            $('#approve_purpose').val(purpose);

            var purpose = $(this).data('specific_purpose');
            $('#approve_specific_purpose').val(purpose);

            var email = $(this).data('email');
            $('#approve_email').val(email);

            var contact_number = $(this).data('contact_number');
            $('#approve_contact_number').val(contact_number);

            var status = $(this).data('status');
            $('#approve_status').val(status);

            var reason = $(this).data('reason');
            $('#reason').val(reason);

            var ctrl_no = $(this).data('ctrl_no');
            $('#approve_ctrl_no').val(ctrl_no);

            if(status === 'Approved') {
            $('#reason_container').hide();
            } else {
            $('#reason_container').show();
            }

       

            $('#ApproveApplicantModal').modal('show');
        });


        $(document).on('click', '.saveChanges', function(e) {
            e.preventDefault();

            // Check other form fields for validation here...
            if ($('#approve_rank').val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Rank is Require!',
                    customClass: {
                        container: 'my-swal-container',
                    },
                });
                return false;
            }
            if ($('#approve_first_name').val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'First Name is Require!',
                    customClass: {
                        container: 'my-swal-container',
                    },
                });
                return false;
            }
            if ($('#approve_last_name').val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Last Name is Require!',
                    customClass: {
                        container: 'my-swal-container',
                    },
                });
                return false;
            }
            if ($('#approve_badge_number').val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Badge Number is Require!',
                    customClass: {
                        container: 'my-swal-container',
                    },
                });
                return false;
            }

            // if ($('#approve_unit').val() == '') {
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Warning',
            //         text: 'Unit is Require!',
            //         customClass: {
            //             container: 'my-swal-container',
            //         },
            //     });
            //     return false;
            // }
            if ($('#approve_purpose').val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Purpose is Require!',
                    customClass: {
                        container: 'my-swal-container',
                    },
                });
                return false;
            }
            if ($('#approve_email').val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Email is Require!',
                    customClass: {
                        container: 'my-swal-container',
                    },
                });
                return false;
            }
            if ($('#approve_contact_number').val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Contact Number is Require!',
                    customClass: {
                        container: 'my-swal-container',
                    },
                });
                return false;
            }

            if ($('#approve_status').val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Status is Require!',
                    customClass: {
                        container: 'my-swal-container',
                    },
                });
                return false;
            }

            if ($('#reason').val() == '' && $('#approve_status').val() == 'Uncleared') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Reason is Require!',
                    customClass: {
                        container: 'my-swal-container',
                    },
                });
                return false;
            }

            var id = $('#approve_id').val();
            var data = {
                'id': id,
                'rank': $('#approve_rank').val(),
                'first_name': $('#approve_first_name').val(),
                'middle_name': $('#approve_middle_name').val(),
                'last_name': $('#approve_last_name').val(),
                'qlr': $('#approve_qlr').val(),
                'badge_number': $('#approve_badge_number').val(),
                // 'unit': $('#approve_unit').val(),
                'purpose': $('#approve_purpose').val(),
                'specific_purpose': $('#approve_specific_purpose').val(),
                'email': $('#approve_email').val(),
                'contact_number': $('#approve_contact_number').val(),
                'status': $('#approve_status').val(),
                'ctrl_no': $('#approve_ctrl_no').val(),
                'reason': $('#reason').val()
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            Swal.fire({
                title: 'Are you sure you want to save changes?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Save it!',
                customClass: {
                    container: 'my-swal-container',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/approvedApplicant/" + id,
                        type: "PUT",
                        data: data,
                        success: function(response) {
                            if (response.alert === 'success') {
                                // Reload the table using AJAX
                                myTable.ajax.reload();

                                // Hide the modal
                                $('#ApproveApplicantModal').modal('hide');

                                // Display a success message when changes are saved with custom class
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Your changes have been saved.',
                                    icon: 'success',
                                    customClass: {
                                        container: 'my-swal-container',
                                    },
                                });
                            } else {
                                // Display a warning message if there was an error updating the data
                                Swal.fire({
                                    title: 'Warning',
                                    text: response.message,
                                    icon: 'warning',
                                });
                            }
                        },
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Handle the case when the user clicks "Cancel" and does not save the data
                    Swal.fire({
                        title: 'Changes discarded',
                        text: 'Your changes have not been saved.',
                        icon: 'info',
                        customClass: {
                            container: 'my-swal-container',
                        },
                    });
                }
            });
        });
        // end update modal

        //Move data to approved TABLE
        $(document).on('click', '.MoveApproveModal', function(e) {
            e.preventDefault();

            id = $(this).data('id');
            $('#move_id').val(id);

            var rank = $(this).data('rank');
            $('#move_rank').val(rank);

            var first_name = $(this).data('first_name');
            $('#move_first_name').val(first_name);

            var middle_name = $(this).data('middle_name');
            $('#move_middle_name').val(middle_name);

            var last_name = $(this).data('last_name');
            $('#move_last_name').val(last_name);

            var qlr = $(this).data('qlr');
            $('#move_qlr').val(qlr);

            var badge_number = $(this).data('badge_number');
            $('#move_badge_number').val(badge_number);

            // var unit = $(this).data('unit');
            // $('#move_unit').val(unit);

            var purpose = $(this).data('purpose');
            $('#move_purpose').val(purpose);

            var specific_purpose = $(this).data('specific_purpose');
            $('#move_specific_purpose').val(specific_purpose);

            var email = $(this).data('email');
            $('#move_email').val(email);

            var contact_number = $(this).data('contact_number');
            $('#move_contact_number').val(contact_number);

            var status = $(this).data('status');
            $('#move_status').val(status);


            var ctrl_no = $(this).data('ctrl_no');
            $('#move_ctrl_no').val(ctrl_no);

            var reason = $(this).data('reason');
            $('#move_reason').val(reason);

            if(status === 'Approved') {
            $('#reason_container').hide();
            } else {
            $('#reason_container').show();
            }

            $('#MoveApproveModal').modal('show');
        });

        var id = $('#move_id').val();
        var data = {
            'id': id,
            'rank': $('#move_rank').val(),
            'first_name': $('#move_first_name').val(),
            'middle_name': $('#move_middle_name').val(),
            'last_name': $('#move_last_name').val(),
            'qlr': $('#move_qlr').val(),
            'badge_number': $('#move_badge_number').val(),
            // 'unit': $('#move_unit').val(),
            'purpose': $('#move_purpose').val(),
            'specific_purpose': $('#move_specific_purpose').val(),

            'email': $('#move_email').val(),
            'contact_number': $('#move_contact_number').val(),
            'ctrl_no': $('#move_ctrl_no').val(),

            'reason': $('#move_reason').val(),
            'status': $('#move_status').val()

        };

        $(document).on('click', '.approvedData', function(e) {
            e.preventDefault();

            if ($('#move_status').val() == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: 'Status not yet approve!',
                    customClass: {
                        container: 'my-swal-container',
                    },
                });
                return false;
            }




            $.ajax({
                url: '/move-data',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'You have approved apppicant successfully!',
                        customClass: {
                            container: 'my-swal-container',
                        },
                    });

                    // Reload the table using AJAX
                    myTable.ajax.reload();
                    $('#MoveApproveModal').modal('hide');
                },
                error: function(error) {
                    console.error(error);
                    alert('Something went wrong!');

                }
            });

        });

        $(document).ready(function() {
            $('#MoveForm :input').not('#ApprovedBtn').prop('disabled', true);
        });
    </script>

    <!-- input trappings for text -->
    <script>
        const approve_first_name = document.getElementById('approve_first_name');
        const warningMessage = document.getElementById('warningMessage');

        approve_first_name.addEventListener('input', function() {
            const inputValue = this.value;
            const sanitizedValue = inputValue.replace(/[^A-Za-z\s-]/g, '');

            if (inputValue !== sanitizedValue) {
                this.value = sanitizedValue;
            }

            if (inputValue !== this.value) {
                warningMessage.style.display = 'block';
            } else {
                warningMessage.style.display = 'none';
            }
        });
    </script>

    <script>
        const approve_middle_name = document.getElementById('approve_middle_name');
        const M_NameMessage = document.getElementById('M_NameMessage');

        approve_middle_name.addEventListener('input', function() {
            const inputValue = this.value;
            const sanitizedValue = inputValue.replace(/[^A-Za-z\s-]/g, '');

            if (inputValue !== sanitizedValue) {
                this.value = sanitizedValue;
            }

            if (inputValue !== this.value) {
                M_NameMessage.style.display = 'block';
            } else {
                M_NameMessage.style.display = 'none';
            }
        });
    </script>

    <script>
        const approve_last_name = document.getElementById('approve_last_name');
        const L_NameMessage = document.getElementById('L_NameMessage');

        approve_last_name.addEventListener('input', function() {
            const inputValue = this.value;
            const sanitizedValue = inputValue.replace(/[^A-Za-z\s-]/g, '');

            if (inputValue !== sanitizedValue) {
                this.value = sanitizedValue;
            }

            if (inputValue !== this.value) {
                L_NameMessage.style.display = 'block';
            } else {
                L_NameMessage.style.display = 'none';
            }
        });
    </script>

    <script>
        const approve_qlr = document.getElementById('approve_qlr');
        const QlrMessage = document.getElementById('QlrMessage');

        approve_qlr.addEventListener('input', function() {
            const inputValue = this.value;
            const sanitizedValue = inputValue.replace(/[^A-Za-z]/g, '');

            if (inputValue !== sanitizedValue) {
                this.value = sanitizedValue;
            }

            if (inputValue !== this.value) {
                QlrMessage.style.display = 'block';
            } else {
                QlrMessage.style.display = 'none';
            }
        });
    </script>

    <!-- <script>
        const approve_unit = document.getElementById('approve_unit');
        const UnitMessage = document.getElementById('UnitMessage');

        approve_unit.addEventListener('input', function() {
            const inputValue = this.value;
            const sanitizedValue = inputValue.replace(/[^A-Za-z\s-]/g, '');

            if (inputValue !== sanitizedValue) {
                this.value = sanitizedValue;
            }

            if (inputValue !== this.value) {
                UnitMessage.style.display = 'block';
            } else {
                UnitMessage.style.display = 'none';
            }
        });
    </script> -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const purpose = document.getElementById('approve_purpose');
            const purposeMessage = document.getElementById('purposeMessage');

            purpose.addEventListener('input', function() {
                const inputValue = this.value;
                const sanitizedValue = inputValue.replace(/[^A-Za-z\s-]/g, '');

                if (inputValue !== sanitizedValue) {
                    this.value = sanitizedValue;
                }

                if (inputValue !== this.value) {
                    purposeMessage.style.display = 'block';
                } else {
                    purposeMessage.style.display = 'none';
                }
            });
        });
    </script>
    <!-- end of input trappings for text -->

    <!-- input trappings for badge number -->
    <script>
        const approve_badge_number = document.getElementById('approve_badge_number');
        const badge_numberMessage = document.getElementById('badge_numberMessage');

        approve_badge_number.addEventListener('input', function() {
            const value = this.value;
            const sanitizedValue = value.replace(/[^\d-]/g, '');

            if (sanitizedValue !== value) {
                badge_numberMessage.style.display = 'block';
            } else {
                badge_numberMessage.style.display = 'none';
            }

            this.value = sanitizedValue;
        });
    </script>

    <!-- input trappings for mobile number -->
    <script>
        const approve_contact_number = document.getElementById('approve_contact_number');
        const mobileErrorMessage = document.getElementById('mobileErrorMessage');

        approve_contact_number.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 11);

            if (!isValidInput(this.value)) {
                mobileErrorMessage.style.display = 'block';
            } else {
                mobileErrorMessage.style.display = 'none';
            }
        });

        function isValidInput(value) {
            return /^\d+$/.test(value);
        }
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

    <script>
        // Get the select element and textarea container
        const selectStatus = document.getElementById('approve_status');
        const reasonContainer = document.getElementById('reason_container');

        // Add event listener for the change event
        selectStatus.addEventListener('change', function() {
            // Check if the selected value is "Uncleared"
            if (selectStatus.value === 'Uncleared') {
                // Show the textarea container
                reasonContainer.style.display = 'block';
            } else {
                // Hide the textarea container
                reasonContainer.style.display = 'none';
            }
        });
    </script>


    <script>
        function checkStatus() {
            var status = document.getElementById("approve_status").value;
            var textArea = document.getElementById("reason");

            if (status === "Approved") {
                textArea.value = ""; // Clear the text area

            }
        }
    </script>

    <script>
        function submitApplication() {
            // Show the loading spinner and update the button text
            document.getElementById('loading-spinners').style.display = 'inline-block';
            document.getElementById('button-text1').innerText = 'Releasing...';

            // Simulate an asynchronous request (you would replace this with your actual submission logic)
            setTimeout(function() {
                // Enable the button


                // Hide the loading spinner and update the button text
                document.getElementById('loading-spinners').style.display = 'none';
                document.getElementById('button-text1').innerText = 'Release';

            }, 4000); // Simulate a 2-second delay for demonstration purposes
        }
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
@endsection
