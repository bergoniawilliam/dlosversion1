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
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
        }
.hidden-input {
    display: none;
  }
  table.fixed {
    table-layout: auto;
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
#loading-spinner {
       display: none;
        }
#UserTable th:nth-child(3),
#UserTable td:nth-child(3) {
  display: none;
}  
.text-right {
        padding-top: 20px; 
    }  
  </style>
@endsection

@section('content')

<!-- loadind effects -->
<div id="loading-container">
    <img src="../image/loading.gif" alt="Loading icon">
</div>

<div class="ibox-content">    
<div class="table-responsive">
<table class="fixed table table-striped" id="UserTable" >
  
            <div class="text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegisterModal">
            <i class="fa fa-user-plus"></i> Add New User
            </button>
            </div>    
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
    </colgroup>
                        <thead>
                      
                        <tr>
                          <th style="background-color: #05367C;  color: #FFFFFF;">ID</th>
                          <th style="background-color: #05367C;  color: #FFFFFF; ">User Name</th>
                          <th style="background-color: #05367C;  color: #FFFFFF; ">Password</th>   
                          <th style="background-color: #05367C;  color: #FFFFFF;">Rank</th>   
                          <th style="background-color: #05367C;  color: #FFFFFF; ">Full Name</th> 
                          <th style="background-color: #05367C;  color: #FFFFFF;">Designation</th>        
                          <th style="background-color: #05367C;  color: #FFFFFF;">User Type</th>
                          <th style="background-color: #05367C;  color: #FFFFFF;">Status</th>    
                          <th style="background-color: #05367C;  color: #FFFFFF;">Action</th>
                       </tr>
                      </thead>

                                      <tbody>
                                     
                                      </tbody>
                                  </table>
                                        
                             </div>
                            </div>
                            
<!-- Modal Add User -->
<div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" aria-labelledby="RegisterModalModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="RegisterModal">Add New User</h3>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: red;">&times;</span><span class="sr-only">Close</span></button>
      </div>
                    <form id="frmRegister" method="post" action="{{route('addapplicant')}}">
                     @csrf

                    <div class="modal-body">

                    <div class="alert alert-danger" role="alert" id="warningMessage" style="display: none;">
                        Invalid input. Letters only!
                    </div>
                    <div class="alert alert-danger" role="alert" id="stationMessage" style="display: none;">
                        Invalid input. Letters only!
                    </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" required="">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required="">
                        </div>

                            <div class="form-group">
                            <label for="rank">Rank</label>
                            <div class="input-group">
                            <select class="custom-select" id="rank" name="rank" required>
                            <option value="">-- Select Rank--</option>
                            <option value="Police Brigadier General">PBGEN</option>
                            <option value="Police Colonel">PCOL</option>
                            <option value="Police Lieutenant Colonel">PLTCOL</option>
                            <option value="Police Major">PMAJ</option>
                            <option value="Police Captain">PCPT</option>
                            <option value="Police Lieutenant">PLT</option>
                            <option value="Police Executive Master Sergeant">PEMS</option>
                            <option value="Police Chief Master Sergeant">PCMS</option>
                            <option value="Police Senior Master Sergeant">PSMS</option>
                            <option value="Police Master Sergeant">PMSg</option>
                            <option value="Police Staff Sergeant">PSSg</option>
                            <option value="Police Corporal">PCpl</option>
                            <option value="Patrolman">Pat</option>
                            <option value="Non-Uniformed Personnel">NUP</option>
                            </select>
                            </div>
                            </div>

                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control"id="name" name="full_name" required="">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control"id="station" name="designation" required="">
                        </div>
                            <div class="form-group">
                            <label for="user_type">User Type</label>
                            <div class="input-group">
                            <select class="custom-select" id="user_type" name="user_type" required>
                            <option value="">-- Select User Type--</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="User">User</option>
                            </select>
                            </div>
                            </div>
                            </div>
      <div class="modal-footer">
        <button id="submit-button" class="btn btn-primary" type="submit" onclick="addUser()">
        <span id="loading-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span id="button-text">Add User</span>
      </button>
      </div>
      
    
    </form>
    </div>
  </div>
</div>


<!-- Edit User's Profile -->
        <div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content ">
        <div class="modal-header">
        <h3 class="modal-title" id="EditUserModal">Edit User's Profile</h3>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: red;">&times;</span><span class="sr-only">Close</span></button>
      </div>
  
      <form id="frmEditUser" method="post">
                     @csrf
                    <div class="modal-body">

                    <div class="alert alert-danger" role="alert" id="editMessage" style="display: none;">
                        Invalid input. Letters only!
                     </div>

                    <div class="form-group  hidden-input">
                            <label>ID</label>
                            <input type="text" class="form-control" id="edit_id" name="id" required="">
                        </div>
                            <div class="form-group">
                            <label for="rank">Rank</label>
                            <div class="input-group">
                            <select class="custom-select" id="edit_rank" name="rank" required>
                            <option value="">-- Select Rank--</option>
                            <option value="Police Brigadier General">PBGEN</option>
                            <option value="Police Colonel">PCOL</option>
                            <option value="Police Lieutenant Colonel">PLTCOL</option>
                            <option value="Police Major">PMAJ</option>
                            <option value="Police Captain">PCPT</option>
                            <option value="Police Lieutenant">PLT</option>
                            <option value="Police Executive Master Sergeant">PEMS</option>
                            <option value="Police Chief Master Sergeant">PCMS</option>
                            <option value="Police Senior Master Sergeant">PSMS</option>
                            <option value="Police Master Sergeant">PMSg</option>
                            <option value="Police Staff Sergeant">PSSg</option>
                            <option value="Police Corporal">PCpl</option>
                            <option value="Patrolman">Pat</option>
                            </select>
                            </div>
                            </div>

                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" id="edit_full_name" name="full_name" required="">
                        </div>
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control"id="edit_designation" name="designation" required="">
                        </div>

                        <div class="form-group">
                            <label for="edit_user_type">User Type</label>
                            <div class="input-group">
                            <select class="custom-select" id="edit_user_type" name="edit_user_type" required>
                            <option value="">-- Select User Type--</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="User">User</option>
                            </select>
                            </div>
                            </div>
                        <div class="form-group">
                            <label for="edit_status">Status</label>
                            <div class="input-group">
                            <select class="custom-select" id="edit_status" name="edit_status" required>
                            <option value="">-- Select Status--</option>
                            <option value="Active">Activate</option>
                            <option value="Deactivated">Deactivate</option>
                            </select>
                            </div>
                        </div>
                            
      </div>
      <div class="modal-footer">
        <button id="submit-button" class=" saveEdit btn btn-primary" type="submit" onclick="editUser()">
        <span id="loading-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span id="button-text">Save Changes</span>
      </button>
      </div>

    </form>
    </div>
  </div>
</div>

<!-- Change Username & Password -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Edit User's Password</h3>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" style="color: red;">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <form id="frmEditUserPass" method="post">
     @csrf
     <div class="modal-body">
                    <div class="form-group hidden-input">
                            <label>ID</label>
                            <input type="text" class="form-control" id="change_id" name="id" required="">
                        </div>
                        <div class="form-group hidden-input">
                            <label>Email</label>
                            <input type="email" class="form-control" id="change_user_name" name="email" required="">
                        </div>
                        <div class="form-group ">
                            <label>Password</label>
                            <input type="password" class="form-control" id="change_password" name="password" required="">
                        </div>
                         <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="change_password_confirmation" name="password_confirmation" required="">
                        </div>
                            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="saveEditUserPass btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </body>

@endsection

@section('script')

<script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">


// Showing data from the table
var myTable = "";

$(document).ready(function () {
  myTable = $('#UserTable').DataTable({
    dom: 'Blfrtip',
    buttons: [
     
    ],
    processing: true,
    pageLength: 15,
    responsive: true,
    serverSide: true,
    searching: false,
    paging: true,
    lengthMenu: [10, 25, 50, 75, 100],
    ordering: false,
    ajax: {
      url: "{{ route('adminUser') }}",
      type: "post",
      data: function (d) {
        d._token = '{{ csrf_token() }}';
        d.id = $('#id').val();
        d.user_name = $('#user_name').val();
        d.password = $('#password').val();
        d.rank = $('#rank').val();
        d.full_name = $('#full_name').val();
        d.designation = $('#designation').val();
        d.user_type = $('#user_type').val();
        d.user_type = $('#status').val();

        

      },
    },
    columns: [
      { "data": "id" },
      { "data": "user_name" },
      { "data": "password" },
      { "data": "rank" },
      { "data": "full_name" },
      { "data": "designation" },
      { "data": "user_type" },
      { 
    "data": "status",
    "render": function (data, type, row) {
      if (data === 'Deactivated') {
        return '<span class="badge bg-danger">Deactivated</span>';
      } else if (data === 'Active') {
        return '<span class="badge bg-primary">Active</span>';
      } else {
        return '<span class="badge bg-warning">Not yet Activated</span>';
      }
    }
  },
      { "data": "action" },
    ],
  });
});


// Edit User Modal
$(document).on('click', '.EditUserModal', function (e) {
  e.preventDefault();

  var id = $(this).data('id');
  $('#edit_id').val(id);

  var full_name = $(this).data('full_name');
  $('#edit_full_name').val(full_name);

  var rank = $(this).data('rank');
  $('#edit_rank').val(rank);
  
  var designation = $(this).data('designation');
  $('#edit_designation').val(designation);

  var user_type = $(this).data('user_type');
  $('#edit_user_type').val(user_type);

  var status = $(this).data('status');
  $('#edit_status').val(status);

  $('#EditUserModal').modal('show');
});

$(document).on('click', '.saveEdit', function(e) {
  e.preventDefault();

if ($('#edit_rank').val() == '') {
  Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'Rank is required!',
    customClass: {
      container: 'my-swal-container',
    },
  });
  return false;
}
if ($('#edit_full_name').val() == '') {
  Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'Fullname is required!',
    customClass: {
      container: 'my-swal-container',
    },
  });
  return false;
}
if ($('#edit_designation').val() == '') {
  Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'Designation is required!',
    customClass: {
      container: 'my-swal-container',
    },
  });
  return false;
}
if ($('#edit_user_type').val() == '') {
  Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'User type is required!', 
    customClass: {
      container: 'my-swal-container',
    },
  });
  return false;
}
  var id = $('#edit_id').val();
  var data = {
    'id': id,
    // 'user_name': $('#edit_user_name').val(),
    'rank': $('#edit_rank').val(),
    'full_name': $('#edit_full_name').val(),
    // 'password': $('#edit_password').val(),
    'designation': $('#edit_designation').val(),
    'user_type': $('#edit_user_type').val(),
    'status': $('#edit_status').val(),
    
  };

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
  url: "/update-user/" + id,
  type: "PUT",
  data: data,
  success: function(response) {
    if (response.alert === 'success') {
Swal.fire({
    icon: 'success',
    title: 'Saved',
    text: 'You have updated user successfully!',  
  });
        $('form#frmEditUser')[0].reset();
        $('#EditUserModal').modal('hide');
        myTable.ajax.reload();
                }
                else{
        Swal.fire({
        icon: 'warning',
        title: 'Warning',
        text: 'Something went wrong!',
        customClass: {
        container: 'my-swal-container',
    },
                    });
                }
            },
        });
});
// end Edit User's Profile modal
 
// Change Username/Password Modal
$(document).on('click', '.exampleModal', function (e) {
  e.preventDefault();

  var id = $(this).data('id');
  $('#change_id').val(id);

  var user_name = $(this).data('user_name');
  $('#change_user_name').val(user_name);

  var password = $(this).data('password');
  $('#change_password').val(password);

  $('#exampleModal').modal('show');
});

$(document).on('click', '.saveEditUserPass', function(e) {
  e.preventDefault();

  if ($('#change_password').val() == '') {
  Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'Password is required!',
    customClass: {
      container: 'my-swal-container',
    },
  });
  return false;
}

if ($('#change_password_confirmation').val() == '') {
  Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'Password confirmation is required!',
    customClass: {
      container: 'my-swal-container',
    },
  });
  return false;
}

if ($('#change_password').val().length < 8) {
  Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'Password should be at least 8 characters long!',
    customClass: {
      container: 'my-swal-container',
    },
  });
  return false;
}

if ($('#change_password').val() !== $('#change_password_confirmation').val()) {
  Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'Password not must match!',
    customClass: {
      container: 'my-swal-container',
    },
  });
  return false;
}

  var id = $('#change_id').val();
  var data = {
    'id': id,
    'user_name': $('#change_user_name').val(),
    // 'rank': $('#change_rank').val(),
    // 'full_name': $('#change_full_name').val(),
    'password': $('#change_password').val(),
    // 'designation': $('#change_designation').val(),
    // 'user_type': $('#change_user_type').val(),
    
  };

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
  url: "/update-password/" + id,
  type: "PUT",
  data: data,
  success: function(response) {
    if (response.alert === 'success') {
    Swal.fire({
    icon: 'success',
    title: 'Saved',
    text: 'You have updated user successfully!', 
    customClass: {
      container: 'my-swal-container',
    }, 
  });
        $('form#frmEditUserPass')[0].reset();
        $('#exampleModal').modal('hide');
        myTable.ajax.reload();

    }else{
    Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'Something went wrong!',
    customClass: {
      container: 'my-swal-container',
    },
 });
   }
  },
});
});


// Add User
$(function(){

jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Only alphabetical characters"); 

$('#frmRegister').validate({
    rules: {
        email: {
            required: true,
            email: true,
        },
        password: {
            required:true,
            minlength: 8,
            equalTo: "#password_confirmation"
        },
        password_confirmation: {
            
            minlength: 8,
            equalTo: "#password"
        },
        name: {
            required: true,
            lettersonly: true
        },
        designation: {
            required: true,
        },
        rank: {
            required: true,
        },
        user_type: {
            required: true,
        },
    },

    submitHandler: function(){

        var formData = new FormData($('form#frmRegister')[0]);
        $.ajax({
            url: '{{route("adduser")}}',
            type: 'post',
            data: formData,
            dataType: "json",
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
        if (data.alert == "success") {
          Swal.fire({
            title: "Success",
            text: data.message,
            icon: "success"
          });
          $('#frmRegister')[0].reset();
          $('#RegisterModal').modal('hide');
          myTable.ajax.reload();
        } else if (data.alert == "warning") {
            Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'Something went wrong!',
    customClass: {
      container: 'my-swal-container',
    },
          });
        } else if (data.alert == "error") {
            Swal.fire({
    icon: 'warning',
    title: 'Warning',
    text: 'Email already taken!',
    customClass: {
      container: 'my-swal-container',
    },
          });
        }
      },
      error: function(xhr, status, error) {
        // Handle AJAX error, if any
        console.log(xhr.responseText);
      }
    });
  },
  errorPlacement: function(error, element) {
    element.before(error);
  }
});


});

@if(Session::has('message'))

var type = "{{ Session::get('alerttype', 'info') }}";
switch(type){
    case 'info':
        swal({title: "{{Session::get('title') }}",text: "{{Session::get('message')}}",type: "info"});
        break;
    case 'warning':
        swal({title: "{{Session::get('title') }}",text: "{{Session::get('message')}}",type: "warning"});
        break;
    case 'success':
        swal({title: "{{Session::get('title') }}",text: "{{Session::get('message')}}",type: "success"},
        function(){

        });
        break;

    case 'error':
        swal({title: "{{Session::get('title') }}",text: "{{Session::get('message')}}",type: "error"});
        break;
}
@endif
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
  function addUser() {
    // Show the loading spinner when adding user
    document.getElementById('loading-spinner').style.display = 'inline-block';
    document.getElementById('button-text').innerText = 'Adding user...';

    // Simulate an asynchronous request (you would replace this with your actual submission logic)
    setTimeout(function() {
      // Enable the button


      // Hide the loading spinner when adding
      document.getElementById('loading-spinner').style.display = 'none';
      document.getElementById('button-text').innerText = 'Add User';

    }, 3000); // Simulate a 2-second delay for demonstration purposes
  }
</script>

<script>
  function editUser() {
    // Show the loading spinner when editting user
    document.getElementById('loading-spinner').style.display = 'inline-block';
    document.getElementById('button-text').innerText = 'Saving Changes...';

    // Simulate an asynchronous request (you would replace this with your actual submission logic)
    setTimeout(function() {
      // Enable the button


      // Hide the loading spinner when editting
      document.getElementById('loading-spinner').style.display = 'none';
      document.getElementById('button-text').innerText = 'Save Changes';

    }, 2000); // Simulate a 2-second delay for demonstration purposes
  }
</script>


<!-- input trappings for text -->
<script>
    const name = document.getElementById('name');
    const warningMessage = document.getElementById('warningMessage');

    name.addEventListener('input', function() {
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
    const edit_full_name = document.getElementById('edit_full_name');
    const editMessage = document.getElementById('editMessage');

    edit_full_name.addEventListener('input', function() {
        const inputValue = this.value;
        const sanitizedValue = inputValue.replace(/[^A-Za-z\s-]/g, '');

        if (inputValue !== sanitizedValue) {
            this.value = sanitizedValue;
        }

        if (inputValue !== this.value) {
            editMessage.style.display = 'block';
        } else {
            editMessage.style.display = 'none';
        }
    });
</script>

<script>
    const station = document.getElementById('station');
    const stationMessage = document.getElementById('stationMessage');

    station.addEventListener('input', function() {
        const inputValue = this.value;
        const sanitizedValue = inputValue.replace(/[^A-Za-z0-9\s.\-]/g, '');

        if (inputValue !== sanitizedValue) {
            this.value = sanitizedValue;
        }

        if (inputValue !== this.value) {
            stationMessage.style.display = 'block';
        } else {
            stationMessage.style.display = 'none';
        }
    });
</script>
@endsection