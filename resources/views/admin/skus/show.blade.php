@extends('admin.layouts.master')
@section('content')
@section('title', 'Show Category')

{{-- <div class="content-wrapper"> --}}
    <section class="content-header">
        @include('admin.layouts.alert')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1> Category</h1>
                </div>
                <div class="col-sm-3">
                    <a class="btn btn-success btn-sm" href="{{ url('/cities') }}">Back</a>
                    @can('category-edit')
                        <a class="btn btn-primary btn-sm" href="{{ url('/cities/' . $category->id . '/edit') }}">Edit</a>
                    @endcan
                    @can('category-delete')
                        <form method="POST" action="{{ url('cities' . '/' . $category->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                    @endcan
                </div>
                <div class="col-sm-5">
                  
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.card -->

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Show Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $category->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $category->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>
            </div>
        </div>
    </section>
{{-- </div> --}}


@endsection