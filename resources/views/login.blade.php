<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DLOS | Login </title>

    <link href="{{asset('inspinia/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('inspinia/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- Sweet Alert -->
    <link href="{{asset('inspinia/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    
    <style type="text/css">
        body { 

          background:
              linear-gradient(
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.5)
              ),
               
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        .footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          background:none !important;
          color: white;
          text-align: center;
          border: none !important;
        }  
        
        .ibox-content {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .logo {
        width: 100px; /* Adjust the size as needed */
    }
    #loginemail {
  width: 400px; /* Adjust the width value as per your preference */
    }  
    #loginpassword {
  width: 400px; /* Adjust the width value as per your preference */
    }  

#welcome-container {
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
</head>

<div id="loading-container">
    <img src="../image/loading.gif" alt="Loading icon">
</div>

    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="ibox-content">
                <img src="../image/PRO2 LOGO.png" alt="Logo" class="logo">

           
                        <center><h1 class="font-bold">Sign in</h1></center>

                        <form id="loginForm" class="m-t-lg" role="form" method="post" action="{{route('postLogin')}}">
                            @csrf
                            
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Username" name="email" id="loginemail" required="" >
                            </div>
                            <div class="form-group ">
                                <input type="password" class="form-control" placeholder="Password" name="password" id="loginpassword" required="" >
                            </div>
                            <div>
                <p class="m-t">
                I have read this form, understood its contents and consent for submitting and processing of my personal data and other information as required for Discipline Law and Order Section Clearance Information System (DLOSCIS) System registration. I understand that my consent does not preclude the existence of other criteria for lawful processing of personal data and does not waive any of my rights under the Data Privacy Act of 2012 and other applicable laws. 

I acknowledge, further, that the PRO2 reserves its right to re-evaluate and /or terminate the privilege security access I have and all other information and/or Personal data has been collected and processed.
</p>
                </div>
                            <button type="submit" class="btn btn-primary block full-width m-b">LOGIN</button>

                            <a href="forget-password">
                                <small>Forgot password?</small>
                            </a>
                            </form>
                        <p class="m-t">
                            <small>Discipline Law and Order Section Online Clearance System</small>
                        </p>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>

    <div class="footer">
      <p class="text-white"><strong>&copy; 2023 PNP Information Technology Management Service</strong></p>
    </div>

  

    <div class="modal inmodal" id="forgotpassModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <!-- <i class="fa fa-laptop modal-icon"></i> -->
                    <h4 class="modal-title">Forgot Password</h4>
                    
                </div>
                <form id="frmForgotPassword">
                @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="forgot_email" name="forgot_email" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="forgot_password" name="forgot_password" required="">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="forgot_password_confirmation" name="forgot_password_confirmation" required="">
                        </div>                                                                                                                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

    <!-- Mainly scripts -->
    <script src="{{asset('inspinia/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('inspinia/js/popper.min.js')}}"></script>
    <script src="{{asset('inspinia/js/bootstrap.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    

    <!-- Custom and plugin javascript -->
    <script src="{{asset('inspinia/js/inspinia.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/pace/pace.min.js')}}"></script>

    <!-- Sweet alert -->
    <script src="{{asset('inspinia/js/plugins/sweetalert/sweetalert.min.js')}}"></script>

    <script src="{{asset('inspinia/js/plugins/validate/jquery.validate.min.js')}}"></script>

    <script type="text/javascript">

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
                            required:true, 
                            minlength: 8,
                            equalTo: "#password"
                        },
                        name: {
                            required: true,
                            lettersonly: true
                        },
                        station: {
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
                            success: function(data){
                                if(data.alert == "success"){
                                    swal({
                                        title: "Success",
                                        text: data.message,
                                        type: "success"
                                    });
                                    $('#frmRegister')[0].reset();
                                    $('#registerModal').modal('hide');
                                }
                                else{
                                    swal({
                                        title: "Warning",
                                        text: data.message,
                                        type: "warning"
                                    });
                                }
                            },
                        });
                    },
                    errorPlacement: function (error, element) {
                        element.before(error);
                    }
                });
            
                $('#frmForgotPassword').validate({
                    rules: {
                        forgot_email: {
                            required: true,
                            email: true,
                        },
                        forgot_password: {
                            required:true,
                            minlength: 8,
                            equalTo: "#forgot_password_confirmation"
                        },
                        forgot_password_confirmation: {
                            required:true, 
                            minlength: 8,
                            equalTo: "#forgot_password"
                        },
                    },

                    submitHandler: function(){

                        var formData = new FormData($('form#frmForgotPassword')[0]);
                        $.ajax({
                            url: '{{route("fogotpassword")}}',
                            type: 'post',
                            data: formData,
                            dataType: "json",
                            contentType: false,
                            processData: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){
                                if(data.alert == "success"){
                                    swal({
                                        title: "Success",
                                        text: data.message,
                                        type: "success"
                                    });
                                    $('#frmForgotPassword')[0].reset();
                                    $('#registerModal').modal('hide');
                                }
                                else{
                                    swal({
                                        title: "Warning",
                                        text: data.message,
                                        type: "warning"
                                    });
                                }
                            },
                        });
                    },
                    errorPlacement: function (error, element) {
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

    <script>
        window.addEventListener('load', function() {
  setTimeout(function() {
    document.getElementById('loading-container').style.display = 'none';
    document.getElementById('content').style.display = 'block';
  }, 2000); // Adjust the delay time in milliseconds (e.g., 2000 = 2 seconds)
});
    </script>

</html>
