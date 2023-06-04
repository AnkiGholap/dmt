@extends('admin.layouts.master')
@section('content')
@section('title', 'Import Sales Data')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Import Sales Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                       
                        <div>
                            <a href="{{ route('skuForeCastT1Import') }}" class="btn btn-info btn-sm text-white mb-0 me-0" type="button">
                                <i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                     
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
                            <h3 class="card-title">Import New Sku Forecast</h3>
                        </div>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST"  action="{{ route('skuForeCastT1Save') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select Month</label>
                                            <select name="month" class="form-control" required>
                                                <option value="">Select Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Select Year</label>
                                            <select name="year" class="form-control" required>
                                                <option value="">Select Year</option>
                                                <option value="{{date('Y')}}">{{date('Y')}}</option>
                                                <option value="{{date('Y') + 1}}">{{date('Y') + 1}}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Import Lead File</label>
                                            <div class="custom-file">
                                                <input type="file" name="file" id="file" class="custom-file-input" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                                <label class="custom-file-label" for="file">Choose file</label>
                                                @error('file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                {!! Form::label('inf_file', 'Must Follow File Format:') !!}
                                                <a href="{{ asset('files/skuforecast.xlsx') }}"> Download Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group">
                                        <input class="btn btn-primary" type="submit">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection