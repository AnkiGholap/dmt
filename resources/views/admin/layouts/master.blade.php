<!DOCTYPE html>
{{-- <html lang="en" oncontextmenu="return false"> --}}
<html lang="en">



@include('admin/layouts/header')


{{--

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed"> --}}

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

        <div class="wrapper">

            @include('admin/layouts/preloader')


            <!-- Navbar -->
            @include('admin/layouts/topbar')

            <!-- /.navbar -->

            <!-- Sidebar -->
            @include('admin/layouts/sidebar')
            <!-- /.Sidebar -->

            {{-- @include('admin/dashboard') --}}

            @yield('content')

            {{--
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar --> --}}

            <!-- Main Footer -->
            @include('admin/layouts/footer')
            @include('sweetalert::alert')

        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>

        <!-- PAGE PLUGINS -->
        <!-- jQuery Mapael -->
        <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
        <!-- ChartJS -->
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

        <!-- InputMask -->
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('plugins/datepicker/datepicker.js') }}"></script>

        <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

        <script src="{{ asset('js/custom.js') }}"></script>
       
 
        @yield('scripts')
        <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            $('.masterskus').repeater({
                isFirstItemUndeletable: true,
            });

            $('.removeMasterSku').on('click', function(e) {

                var data_id = $(this).data('id');
                var closeClass = $(this).closest('.mastersku');

                if (data_id != '') {
                    swal("You Really Want To Delete?", {
                            buttons: {
                                cancel: "Cancel",
                                confirm: {
                                    text: "Yes",
                                    value: "Yes",
                                },
                            },
                        })
                        .then((value) => {
                            if (value == "Yes") {
                                $.ajax({
                                    method: "POST",
                                    url: "{{ route('removeMasterSku') }}",
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        data_id: data_id,
                                    },
                                    success: function(response) {
                                        if (response.status == "Done") {
                                            closeClass.remove();
                                            $('.successMsg1').html(response.message);
                                            $('#successModal').modal('show');
                                        } else {
                                            $('.errorMsg1').html("Somthing Went Wrong Try Again");
                                            $('#errorModal').modal('show');
                                        }
                                    }
                                });
                            } else {
                                $('.errorMsg1').html('You Cancel The Task');
                                $('#errorModal').modal('show');
                            }
                        });
                }
            });
        });
        </script>
         <script>
        @if (\Session::has('success') || \Session::has('error'))
        
        
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
                $(this).remove();
            });
            }, 10000);
        @endif

        function datepicker(params) {

            $('[data-mask]').inputmask()

            $('.datepicker').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
            }).on('changeDate', function(ev) {
                $(this).datepicker('hide');
            });


        }

        </script>
    </body>

</html>