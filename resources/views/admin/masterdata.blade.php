@extends('admin.layouts.master')
@section('content')
@section('title', 'Dashboard')
  <style>
    .row {
    height: 50%;
    
  }
    table {
      font-family: "Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol" !important;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      font-size: 14px !important;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>  

  <!-- Content Wrapper. Contains page content -->
 
  {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mt-2">
          <div class="col-sm-12">
            <h1 class="m-0" style="text-align: center">MAster Data</h1>
          </div><!-- /.col --><br><br><br>
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    {{-- </div> --}}
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <!-- Info boxes -->
          
          <div class="row">   
            <div class="col-md-1">       
               <label>Filter By : </label>
            </div>
            <div class="col-md-2">       
              <!-- /.col -->
              @if(!empty($categories))
                <select id="category" class="form-control select2" name="category" multiple>
                    <option value="">Filter Category</option>
                    @foreach($categories as $k=>$v)
                        <option value="{{$k}}">{{$v}}</option>
                    @endforeach 
                </select>
              @endif 
            </div>
            <div class="col-md-2">       
              <!-- /.col -->
              @if(!empty($masterskus))
              <select id="mastersku" class="form-control select2" name="mastersku" multiple>
                <option value="">Filter Mastersku</option>
                @foreach($masterskus as $k=>$v)
                  <option value="{{$k}}">{{$v}}</option>
                @endforeach
              </select>
              @endif 
            </div>
            <div class="col-md-2">       
              <!-- /.col -->
              @if(!empty($skus))
              <select id="skus" class="form-control select2" name="skus" multiple>
                <option value="">Filter Skus</option>
                @foreach($skus as $k=>$v)
                  <option value="{{$k}}">{{$v}}</option>
                @endforeach
              </select>
              @endif 
            </div>
            <div class="col-md-2">       
              <!-- /.col -->
              @if(!empty($suppliers))
              <select id="suppliers" class="form-control select2" name="suppliers" multiple>
                <option value="">Filter Suppliers</option>
                  @foreach($suppliers as $k=>$v)
                      <option value="{{$k}}">{{$v}}</option>
                  @endforeach
              </select>
              @endif 
            </div>
            <div class="filter">
              <button class="btn btn-dark" id="searchfilter">Apply Filter</button>
                      <!-- /.col -->
            </div>
            <div class="filter">
            <button class="btn btn-dark" id="salesid">Top 25 Sales</button>
            </div>
            <div class="filter">
              <a id="stockid"><button class="btn btn-dark" id="top25stocks">Top 25 Stocks</button></a>
            </div>
            <br><br>
          <!-- /.row -->
          </div>
          <!-- Ad(d more checkboxes for each column you want to filter/hide/show -->
          @if(!empty($skudata))
              <div class="card mt-3">
                  <div class="card-header">
                      <h3 class="card-title"><strong>Master Data</strong></h3>
                  </div>
                <!-- /.card-header -->
                  <div class="card-body">
                    <table class="display data-table1" style="width:100%">
                      <thead>
                        <tr>
                          <th>SKU Code</th>
                          <th>Item Name</th>
                          <th>Master SKU</th>
                          <th>Category</th>
                          <th colspan="2">
                            <div class="row">Actual Data</div>
                            <div class="row">
                              <div style="width: 33.33%; float: left;">M</div>
                              <div style="width: 33.33%; float: left;">M1</div>
                              <div style="width: 33.33%; float: left;">M2</div>
                            </div>
                          </th> 
                         
                          
                        </tr>
                      </thead>
                      <tbody>
                        @php 
                          $srNo = 1;
                        @endphp
                        @foreach($skudata as $key => $sku)
                          <tr>
                            <td>{{$sku->sku_code ? $sku->sku_code : '-' }}</td>
                            <td>{{$sku->name ? $sku->name :'-' }}</td>
                            <td>{{@$sku->mastersku->mastersku ? $sku->mastersku->mastersku : '-'}}</td>
                            <td>{{@$sku->category->name ? $sku->category->name : '-'}}</td>
                        
                      <td>
                        
                        <div style="width: 33.33%; float: left;">{{@$sku->skuPastTwoMonth->online? number_format($sku->skuPastTwoMonth->online) : '-'}}</div>
                        <div style="width: 33.33%; float: left;">{{@$sku->skuPastOneMonth->online? number_format($sku->skuPastOneMonth->online) : '-'}}</div>
                        <div style="width: 33.33%; float: left;">{{@$sku->actualSalesData()? number_format($sku->actualSalesData()->sum('t_month_online')) : '-'}}</div>
                      </td>
                           
                        @endforeach
                       
                      </tbody>
                    </table>
                  </div>
              </div>
          
          @endif  
        <!-- /.row -->

       
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
