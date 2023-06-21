@extends('admin.layouts.master')
@section('content')
@section('title', 'Skus')

<div class="content-wrapper">
    <section class="content-header">
        @include('admin.layouts.alert')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Skus List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @can('sku-create')
                            <div>
                                <a href="{{  url('/skus/create') }}" class="btn btn-primary btn-sm text-white mb-0 me-0"
                                    type="button"> <i class="fa fa-plus"></i> Add new
                                    Skus</a>
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
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">Skus List</h3> --}}

                            <div class="card-tools">
                                    {!! Form::open(['method' => 'GET', 'url' => '/skus', 'role' => 'search'])  !!}

                                <div class="input-group input-group-sm" style="width: 150px;">

                                    <input type="text" name="search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                    {!! Form::close() !!}

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 600px;">
                            <table class="table table-head-fixed text-nowrap" style="text-align: center">
                                     <thead>
                        <tr>
                            <th>#</th><th>Sku Code</th><th>Name</th><th>Category</th><th>Supplier</th><th>Master Sku</th><th>Price</th><th>Status</th><th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                      @foreach($skus as $item)
                            <tr>
                                <td>{{ (($skus->currentPage() - 1 ) * $skus->perPage() ) + $loop->iteration }}</td>
                                <td>{{ @$item->sku_code }}</td>
                                <td>{{ @$item->name }}</td>
                                <td>{{ @$item->category->name }}</td>
                                <td>{{ @$item->supplier->name }}</td>
                                <td>{{ @$item->mastersku->mastersku }}</td>
                                <td>{{ @$item->price }}</td>
                                <td><label class="badge badge-{{ $item->status == 1 ? 'success' : 'danger' }}">{{ $item->status==1?'Active':'Inactive' }}</label></td>
                                <td>
                                    @can('sku-edit')
                                    <a href="{{ url('/skus/' . $item->id . '/edit') }}" title="Edit Skus"><button class="btn btn-primary btn-sm"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button></a>
                                    @endcan

                                    @can('sku-delete')
                                    <form method="POST" action="{{ url('/skus' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit"  class="btn btn-danger btn-sm" title="Delete Skus" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                           <br>
                        <div class="pagination-wrapper"> {!! $skus->appends(['search' => Request::get('search')])->render() !!} </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>


@endsection