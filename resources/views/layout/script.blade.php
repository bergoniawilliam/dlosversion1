<!-- Mainly scripts -->
<script src="{{asset('inspinia/js/popper.min.js')}}"></script>
<script src="{{asset('inspinia/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('inspinia/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('inspinia/js/bootstrap.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" type="text/javascript"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('inspinia/js/inspinia.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/pwstrength/pwstrength-bootstrap.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/pwstrength/zxcvbn.js')}}"></script>


<script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
<script src="{{asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

<script>


    $('body').on('hidden.bs.modal', function(){
        if ($('.modal:visible').length) {
            $('body').addClass('modal-open');
        }
    });

    function toasterOptions() {
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }

    };

</script>
