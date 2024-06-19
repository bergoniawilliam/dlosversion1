@extends('layout.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<style>
  .swal2-container {
  z-index: 9999; /* Ensure Swal message appears above other elements */
}

.modal {
  z-index: 9998; /* Set a lower z-index value for your modal */
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
  #loading-spinner {
       display: none;
        }
  #loading-spinner1 {
       display: none;
        }


</style>
    <h1>My Profile</h1>
<br>
<br>
    <form id="frmEditUser" action="/update-profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
                     @csrf 
                     @method('PUT')

                     <div class="alert alert-danger" role="alert" id="warningMessage" style="display: none;">
                        Invalid input. Letters only!
                    </div>

                    <div class="form-group  hidden-input">
                            <label>ID</label>
                            <input type="text" class="form-control" id="edit_id" name="id" required="" value="{{$user->id}}">
                    </div>

                    <div class="profile-pic">
                          <center><img id="preview" src="{{ asset('image/' . Auth::user()->profilePic) }}" alt="Profile Image" width="200" height="200"style="border-radius: 50%; object-fit: cover;"></center>
                    </div>
                        <br>
                      <div class="form-group d-grid gap-1">
                          <strong><label>Profile Picture</label></strong>
                          <input type="file" class="form-control" name="profilePic" accept="image/*" required onchange="previewImage(event)">
                      </div>
                        
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong><label for="rank">Rank</label></strong>
                            <div class="input-group">
                            <select class="custom-select" id="edit_rank" name="rank" required value="">
                            <option value="{{$user->rank}}">{{$user->rank}}</option>
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
                            <div class="form-group col-md-6">
                            <strong><label>Full Name</label></strong>
                            <input type="text" class="form-control" id="edit_full_name" name="full_name" value="{{ $user->full_name }}" required>
                        </div>
                      </div>
                        <div class="form-group">
                            <strong><label>Designation</label></strong>
                            <input type="text" class="form-control"id="edit_designation" name="designation" required="" value="{{$user->designation}}">
                        </div>
                           
                     
    
        <div class="d-grid gap-1">
        <button id="submit-button" class=" btn btn-primary block full-width m-b" type="submit" onclick="editUser()">
        <span id="loading-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span id="button-text">Save Changes</span>
      </button>
      </div>
    
    <button id="submit-button1" class=" btn btn-danger block full-width m-b"  data-toggle="modal" data-target="#changePassModal">
        <span id="loading-spinner1" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span id="button-text1">Change Password</span>
    </button>
    </form>
    </div>
  </div>

  <!-- Modal Change Password -->
  <div class="modal fade" id="changePassModal" tabindex="-1" role="dialog" aria-labelledby="changePassModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="changePassModalLabel">Change Password</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
          <span aria-hidden="true" style="color: red;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="frmchangePass" action="/change-password/{{$user->id}}" method="POST">
                     @csrf 
                     @method('PUT')
                    <div class="form-group hidden-input">
                            <label>ID</label>
                            <input type="text" class="form-control" id="change_id" name="id" value="{{$user->id}}" required>
                        </div>
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
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
        <button type="submit" class="btn btn-primary" onclick="changePass()">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script>

function editUser() {
  // Prevent the default form submission
  event.preventDefault();
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

  // Disable the submit button and show the loading spinner
  document.getElementById('submit-button').disabled = true;
  document.getElementById('loading-spinner').style.display = 'inline-block';
  document.getElementById('button-text').style.display = 'none';

  // Perform the form submission using AJAX
  let form = document.getElementById('frmEditUser');
  let formData = new FormData(form);

  // Send the AJAX request
  fetch(form.action, {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .then(data => {
      // Show Swal message based on the response
      Swal.fire({
        title: "Success",
        icon: data.alert,
        text: data.message
      });
    })
    .catch(error => {
      // Show Swal message for error
      Swal.fire({
        icon: 'error',
        text: 'Failed to save update'
      });
    })
    .finally(() => {
      // Reset the button state
      document.getElementById('submit-button').disabled = false;
      document.getElementById('loading-spinner').style.display = 'none';
      document.getElementById('button-text').style.display = 'inline-block';
    });
}

function changePass() {
  // Prevent the default form submission
  event.preventDefault();

  @if(Session::has('error_message'))
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: "{{ Session::get('error_message') }}",
            customClass: {
                container: 'my-swal-container',
            },
        });
    @endif

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
if ($('#change_password').val() === $('#current_password').val() ||
      $('#change_password_confirmation').val() === $('#current_password').val()) {
    Swal.fire({
      icon: 'warning',
      title: 'Warning',
      text: 'Cannot use the old password as your new password!',
      customClass: {
        container: 'my-swal-container',
      },
    });
    return false;
  }


  // Disable the submit button and show the loading spinner
  document.getElementById('submit-button1').disabled = true;
  document.getElementById('loading-spinner1').style.display = 'inline-block';
  document.getElementById('button-text1').style.display = 'none';

  // Perform the form submission using AJAX
  let form = document.getElementById('frmchangePass');
  let formData = new FormData(form);

  // Send the AJAX request
 // Send the AJAX request
fetch(form.action, {
  method: 'POST',
  body: formData
})
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // Show success Swal message
      Swal.fire({
        title: "Success",
        icon: 'success',
        text: data.message
      }).then(() => {
        // Reset the form and hide the modal
        form.reset();
        $('#changePassModal').modal('hide');
      });
    } else {
      // Show Swal message for error (incorrect current password)
      Swal.fire({
        icon: 'warning',
        title: 'Warning',
        text: data.message,
        customClass: {
          container: 'my-swal-container',
        },
      });
    }
  })
  .catch(error => {
    // Show generic Swal message for other errors
    Swal.fire({
      icon: 'error',
      text: 'Failed to save update'
    });
  })
  .finally(() => {
    // Reset the button state
    document.getElementById('submit-button1').disabled = false;
    document.getElementById('loading-spinner1').style.display = 'none';
    document.getElementById('button-text1').style.display = 'inline-block';
  });
}
</script>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        var oldPreview = document.getElementById('oldPreview');
        var preview = document.getElementById('preview');
        if (oldPreview) {
            preview.src = oldPreview.src;
            preview.style.display = 'block';
        }
    });

// Preview profile picture
function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('preview');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>

<!-- input trappings for text -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const editFullName = document.getElementById('edit_full_name');
    const warningMessage = document.getElementById('warningMessage');
    let timerId;

    editFullName.addEventListener('input', function() {
      clearTimeout(timerId);

      const inputValue = this.value;
      const sanitizedValue = inputValue.replace(/[^A-Za-z\s-]/g, '');

      if (inputValue !== sanitizedValue) {
        this.value = sanitizedValue;
      }

      if (inputValue !== this.value) {
        warningMessage.style.display = 'block';
        timerId = setTimeout(function() {
          warningMessage.style.display = 'none';
        }, 1000); // Adjust the delay time (in milliseconds) as needed
      } else {
        warningMessage.style.display = 'none';
      }
    });
  });

</script>




