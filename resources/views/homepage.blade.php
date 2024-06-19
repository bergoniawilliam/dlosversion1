@extends('layout.masterhome')

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Lato", sans-serif
        }

        .w3-bar,
        h1,
        button {
            font-family: "Montserrat", sans-serif
        }

        .fa-anchor,
        .fa-coffee {
            font-size: 800px
        }

        .modal-header {
            background-color: #05367C;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        body {
            margin: 0;
            padding: 0;
        }

        header {
            padding: 100px 10px;

            background-size: cover;
            background-position: center;
            text-align: center;
            color: white;
        }

        .header-title {
            margin: 0;
            font-size: 3rem;
        }

        .header-subtitle {
            margin: 0;
            font-size: 2rem;
        }

        .get-started-button {
            margin-top: 20px;
            padding: 20px 40px;
            background-color: black;
            color: white;
            font-size: 1.5rem;
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

        
    


    </style>
</head>

<body>


    <!-- loadind effects -->
    <div id="loading-container">
        <img src="../image/loading.gif" alt="Loading icon">
    </div>

    <!-- Header -->
    <header class="w3-container  w3-center" style="padding:128px 16px">
        <h1 class="w3-margin w3-jumbo">WELCOME</h1>
        <p class="w3-xlarge">to</p>
        <h1 class="w3-margin w3-jumbo">DLOS ONLINE CLEARANCE SYSTEM</h1>
        <button class="w3-button w3-red w3-padding-large w3-large w3-margin-top" data-toggle="modal"
            data-target="#RegistrationModal">Get Started</button>
    </header>

    <!-- First Grid -->
    <div class=" w3-blue w3-row-padding w3-padding-64 w3-container">
        <div class="w3-content">
            <div class="w3-twothird">
                <h1>PNP MISSION</h1>
                <h5 class="w3-padding-32">The PNP shall enforce the law, prevent and control crimes, maintain peace and
                    order, and ensure public safety and internal security with the active support of the community.</h5>

            </div>

            <div class="w3-third w3-center">
                <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
            </div>
        </div>
    </div>

    <!-- Second Grid -->
    <div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
        <div class="w3-content">
            <div class="w3-third w3-center">
                <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
            </div>

            <div class="w3-twothird">
                <h1>PNP VISION</h1>
                <h5 class="w3-padding-32">Imploring the aid of the Almighty, by 2030, We shall be a highly capable,
                    effective and credible police service working in partnership with a responsive community towards the
                    attainment of a safer place to live, work and do business.</h5>


            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity">
        <div class="w3-xlarge w3-padding-32">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
        </div>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>


</body>

</html>


<div class="modal fade bd-example-modal-lg" id="RegistrationModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
      
            <div class="modal-header text-center  ">
                <h3 class="modal-title w-100  text-center ">APPLICATION FORM DLOS CLEARANCE</h3>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true"
                        style="color: red;">&times;</span><span class="sr-only">Close</span></button>
            </div>
 @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-12">

                <form id="frmApplication" class="m-t-lg" role="form" method="post"
                    action="{{ route('ApplicationForm') }}">
                    @csrf
                  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                    <div class="alert alert-danger" role="alert" id="mobileErrorMessage" style="display: none;">
                        Invalid input. Numbers only!
                    </div>
                    <div class="alert alert-danger" role="alert" id="badgeErrorMessage" style="display: none;">
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

                    <strong><label for="rank">Rank</label></strong>
                    <div class="form-group">
                        <div class="input-group">
                            <select class="custom-select" name="rank" required id="rank">
                                <!-- <option value="">-- Select Rank--</option>
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
                            <option value="Pat">Pat</option> -->
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong><label for="inputFirstName">First Name</label></strong>
                                <input type="text" id="inputFirstName" class="form-control"
                                    placeholder="First Name" name="first_name" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong><label for="inputMiddleName">Middle Name</label></strong>
                                <input type="text" id="inputMiddleName" class="form-control"
                                    placeholder="Middle Name" name="middle_name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong><label for="inputLastName">Last Name</label></strong>
                                <input type="text" id="inputLastName" class="form-control"
                                    placeholder="Last Name" name="last_name" required="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong><label for="inputQlr">Qlr</label></strong>
                                <input type="text" id="inputQlr" class="form-control" placeholder="Jr/Sr"
                                    name="qlr">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong><label for="badgeInput">Badge Number</label></strong>
                                <input type="text" id="badgeInput" class="form-control"
                                    placeholder="Badge Number" name="badge_number" required="">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <strong><label for="inputUnit">Unit</label></strong>
                                <input type="text" id="inputUnit" class="form-control" placeholder="Unit"
                                    name="unit" required="">
                            </div>
                        </div> -->
                    </div>
                    <!-- <div class="form-group">
                            <strong><label for="purpose">Purpose</label></strong>
                                <input type="text" id="purpose" class="form-control" placeholder="Purpose" name="purpose" oninput="convertToUppercase(this)" required="">
                            </div> -->

                    <div class="col-sm-4">
                        <div class="form-group">
                            <strong><label for="purpose">Purpose</label></strong>
                            <div class="input-group">
                                <select class="custom-select" name="purpose" required id="purpose">
                                    <option value="">-- Select Purpose--</option>
                                    <option value="Loan">LOAN</option>
                                    <option value="Promotion">Promotion</option>
                                    <option value="Schooling">Schooling</option>
                                    <option value="TRR">Transfer/Reassignment/Reinstatement</option>
                                    <option value="LA">Leave Abroad/Travel Abroad</option>
                                    <option value="Retirement">Retirement/PRBS Requirement</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <strong><label for="specific_purpose">Specific Purpose</label></strong>
                        <input type="text" id="specific_purpose" class="form-control"
                            placeholder="EX: Povident loan" name="specific_purpose"
                            oninput="convertToUppercase(this)" required="">
                    </div>
                    <div class="form-group">
                        <strong><label for="email">Email</label></strong>
                        <input type="email" id="email" class="form-control" placeholder="Email"
                            name="email" required="">

                    </div>
                    <div class="form-group">
                        <strong><label for="myInput">Mobile Number</label></strong>
                        <input type="number" class="form-control" placeholder="Mobile Number" name="contact_number"
                            id="myInput" required="">

                    </div>

                    <div class="form-group">
                        <strong><label>Please read</label></strong><br>
                        
        I have read this form, understood its contents, and consent for submitting and processing of my personal data and other information as required for Discipline Law and Order Section Clearance Information System (DLOSCIS) System registration. I understand that my consent does not preclude the existence of other criteria for lawful processing of personal data and does not waive any of my rights under the Data Privacy Act of 2012 and other applicable laws.

                    </div>

                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    </div> 
  
                    <div class="modal-footer">
                        <button id="submit-button" class="btn btn-primary block full-width m-b" type="submit"
                            onclick="submitApplication()">
                            <span id="loading-spinner" class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                            <span id="button-text">SUBMIT APPLICATION</span>
                        </button>
                    </div>
  

                </form>
            </div>
        </div>

    </div>
</div>
</div>




<!-- Mainly scripts -->

 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        $(document).ready(function() {
            @if(session('success') || session('error'))
                $('#myModal').modal('show');
            @endif
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('inspinia/js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('inspinia/js/popper.min.js') }}"></script>
<script src="{{ asset('inspinia/js/bootstrap.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>



<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia/js/inspinia.js') }}"></script>
<script src="{{ asset('inspinia/js/plugins/pace/pace.min.js') }}"></script>

<!-- Sweet alert -->
<script src="{{ asset('inspinia/js/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script src="{{ asset('inspinia/js/plugins/validate/jquery.validate.min.js') }}"></script>



<script>
    $(function() {

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        }, "Only alphabetical characters");

        $('#frmApplication').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                first_name: {
                    required: true,
                    lettersonly: true,

                },
                last_name: {
                    required: true,
                    lettersonly: true
                },
                badge_number: {
                    required: true,
                },
                contact_number: {
                    required: true,

                },
                status: {
                    required: true,
                },
            },

            submitHandler: function() {

                var formData = new FormData($('form#frmApplication')[0]);
                $.ajax({
                    url: '{{ route('ApplicationForm') }}',
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
                            swal({
                                title: "Success",
                                text: data.message,
                                type: "success"
                            });
                            $('form#frmApplication')[0].reset();
                            $('#RegistrationModal').modal('hide');
                        } else {
                            swal({
                                title: "Warning",
                                text: data.message,
                                type: "warning"
                            });
                        }
                    },
                });
            },
            errorPlacement: function(error, element) {
                element.before(error);
            }
        });

    });

    @if (Session::has('message'))

        var type = "{{ Session::get('alerttype', 'info') }}";
        switch (type) {
            case 'info':
                swal({
                    title: "{{ Session::get('title') }}",
                    text: "{{ Session::get('message') }}",
                    type: "info"
                });
                break;
            case 'warning':
                swal({
                    title: "{{ Session::get('title') }}",
                    text: "{{ Session::get('message') }}",
                    type: "warning"
                });
                break;
            case 'success':
                swal({
                        title: "{{ Session::get('title') }}",
                        text: "{{ Session::get('message') }}",
                        type: "success"
                    },
                    function() {

                    });
                break;

            case 'error':
                swal({
                    title: "{{ Session::get('title') }}",
                    text: "{{ Session::get('message') }}",
                    type: "error"
                });
                break;
        }
    @endif
</script>

<!-- input trappings for mobile number -->
<script>
    const mobileInput = document.getElementById('myInput');
    const mobileErrorMessage = document.getElementById('mobileErrorMessage');

    mobileInput.addEventListener('input', function() {
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


<script>
    const firstnameinput = document.getElementById('inputFirstName');
    const warningMessage = document.getElementById('warningMessage');

    firstnameinput.addEventListener('input', function() {
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
    const inputMiddleName = document.getElementById('inputMiddleName');
    const M_NameMessage = document.getElementById('M_NameMessage');

    inputMiddleName.addEventListener('input', function() {
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
    const inputLastName = document.getElementById('inputLastName');
    const L_NameMessage = document.getElementById('L_NameMessage');

    inputLastName.addEventListener('input', function() {
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
    const inputQlr = document.getElementById('inputQlr');
    const QlrMessage = document.getElementById('QlrMessage');

    inputQlr.addEventListener('input', function() {
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
    const inputUnit = document.getElementById('inputUnit');
    const UnitMessage = document.getElementById('UnitMessage');

    inputUnit.addEventListener('input', function() {
        const inputValue = this.value;
        const sanitizedValue = inputValue.replace(/[^A-Za-z0-9\s-]/g, '');

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
    // document.addEventListener('DOMContentLoaded', function() {
    //   const purpose = document.getElementById('purpose');
    //   const purposeMessage = document.getElementById('purposeMessage');

    //   purpose.addEventListener('input', function() {
    //     const inputValue = this.value;
    //     const sanitizedValue = inputValue.replace(/[^A-Za-z\s-]/g, '');

    //     if (inputValue !== sanitizedValue) {
    //       this.value = sanitizedValue;
    //     }

    //     if (inputValue !== this.value) {
    //       purposeMessage.style.display = 'block';
    //     } else {
    //       purposeMessage.style.display = 'none';
    //     }
    //   });
    // });
</script>
<!-- end input trappings -->

<script>
    $(document).ready(function() {
        // Show the loading container
        $('#loading-container').show();

        // Hide the loading container once the landing page content is loaded
        $(window).on('load', function() {
            $('#loading-container').hide();
        });

        $.ajax({
            url : "/refRanks",
            type:'GET',
            dataType: 'json',
            success: function(response) {
                $("#rank").attr('disabled', false);
                $.each(response,function(key, value)
                {
                    $("#rank").append('<option value=' + value + '>' + value + '</option>');
                });
             }
        });
    });
</script>

<script>
    function submitApplication() {
        // Show the loading spinner and update the button text
        document.getElementById('loading-spinner').style.display = 'inline-block';
        document.getElementById('button-text').innerText = 'Submitting...';

        // Simulate an asynchronous request (you would replace this with your actual submission logic)
        setTimeout(function() {
            // Enable the button


            // Hide the loading spinner and update the button text
            document.getElementById('loading-spinner').style.display = 'none';
            document.getElementById('button-text').innerText = 'Submit Application';

        }, 4000); // Simulate a 2-second delay for demonstration purposes
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

<!-- UPPERCASE INPUT -->
<script>
    function convertToUppercase(element) {
        element.value = element.value.toUpperCase();
    }
</script>

</html>
