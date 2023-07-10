@extends('admin.layouts.master')
@section('content')
@section('title', 'Upload Sku')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            
            <nav class="navbar2">
                <ul>
                  <li><a href="#" class="nav-link {{ request()->is('skus*') ? 'active' : '' }}">Add Sku</a></li>
                  <li><a href="#" class="nav-link {{ request()->is('mastersku*') ? 'active' : '' }}">Add MAster Sku</a></li>
                  <li><a href="#" class="nav-link {{ request()->is('categories*') ? 'active' : '' }}">Add Category</a></li>
                  <li><a href="#" class="nav-link {{ request()->is('suppliers*') ? 'active' : '' }}">Add Suppliers</a></li>
                  <li><a href="#" class="nav-link {{ request()->is('actualStockImport*') ? 'active' : '' }}">Add Actual Stock</a></li>
                  <li><a href="#" class="nav-link {{ request()->is('salesdataImport*') ? 'active' : '' }}">Add Actual Sales</a></li>
                  <li><a href="#" class="nav-link {{ request()->is('skuForeCastT1Import*') ? 'active' : '' }}">Add Forcast</a></li>
                </ul>
            </nav>  
            
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Upload Sku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                       
                        <div>
                            <a href="{{ route('skuImport') }}" class="btn btn-info btn-sm text-white mb-0 me-0" type="button">
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
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Upload Sku</h3>
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
                            <form method="POST"  action="{{ route('skuSave') }}" enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Upload Lead File</label>
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

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                {!! Form::label('inf_file', 'Must Follow File Format:') !!}
                                                <a href="{{ asset('files/sku.xlsx') }}"> Download Now</a>
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