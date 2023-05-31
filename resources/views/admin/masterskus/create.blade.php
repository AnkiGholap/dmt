@extends('admin.layouts.master')
@section('content')
@section('title', 'Create Mastersku')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Mastersku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @can('mastersku-create')
                        <div>
                            <a href="{{ url('/masterskus') }}" class="btn btn-info btn-sm text-white mb-0 me-0" type="button"> <i class="fa fa-arrow-left"></i> Back</a> 
                        </div>
                        @endcan
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Create New Mastersku</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ url('/masterskus') }}" enctype="multipart/form-data">
                                
                                {{ csrf_field() }}
                                @include ('admin.masterskus.form', ['formMode' => 'create'])

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
       $(".mt-repeater").repeater({
            show: function() {
                $(this).show();
            }
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
@endsection
