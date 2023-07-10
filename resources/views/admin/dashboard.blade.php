@extends('admin.layouts.master')
@section('content')
@section('title', 'Dashboard')
  <style>
    .select2-container .select2-selection--multiple .select2-selection__rendered{white-space: break-spaces !important;}
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
            <h1 class="m-0" style="text-align: center">Dashboard</h1>
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
                <option value="">Filter SKU</option>
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
            <button class="btn btn-dark" id="salesid">Top 75 Sales</button>
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
                      <h3 class="card-title"><strong>Dashboard</strong></h3>
                  </div>
                <!-- /.card-header -->
                  <div class="card-body">
                    <table class="display data-table" style="width:100%">
                      <thead>
                        <tr>
                          <th>SKU Code</th>
                          <th>Item Name</th>
                          <th>Master SKU</th>
                          <th>Category</th>
                          <th>Supplier</th>
                          <th>Actual Stock</th>
                          <th>Forcast Data</th> 
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
                            <td>{{@$sku->supplier->name ? $sku->supplier->name : '-'}}</td>
                            <td>{{@$sku->currentDateStock->actual_stock? number_format($sku->currentDateStock->actual_stock) : '-'}}</td>
                            <td><button type="button" class="btn btn-dark actualdata" data-toggle="modal" data-target="#exampleModal" data-code="{{@$sku->sku_code}}" data-id="{{@$sku->id}}" data-name="{{@$sku->name}}">
                              Click Here
                            </button></td>
                          
                          </tr>
                        @endforeach
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title title" id="exampleModalLabel"></h5>
                                
                              </div>
                              <div class="modal-body" id="forecastdata">
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                          </div>
                        </div>
                      </tbody>
                    </table>
                  </div>
              </div>
          
          @endif  
        <!-- /.row -->

        <!-- Main row -->
            <div id="stockiddiv">
                <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><strong>Top 25 Stock Data</strong></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="data-table1">
                      <thead>
                        <tr>
                          <th>SKU Code</th>
                          <th>Item Name</th>
                          <th>Actual Stock</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      
                              @foreach($top25stock as $key => $item)
                                <tr>
                                  <td>{{$item->sku_code ? $item->sku_code : '-' }}</td>
                                  <td>{{$item->name ? $item->name :'-' }}</td>
                                  <td>{{@$item->actual_stock? number_format($item->actual_stock) : '-'}}</td>
                                </tr>
                              @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
                </div>
            </div>
       

        <div id="salesiddiv">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <h3 class="card-title"><strong>Top 25 Sales Data</strong></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="data-table1">
                    <thead>
                      <tr>
                        <th>SKU Code</th>
                        <th>Item Name</th>
                        <th>T1 Month Online</th>
                        <th>T1 Month Offline Select</th>
                        <th>T1 Month Offline Mass</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                      @foreach($top25sales as $key => $item)
                        <tr>
                          <td>{{$item->sku_code ? $item->sku_code : '-' }}</td>
                          <td>{{$item->name ? $item->name :'-' }}</td>
                          <td>{{@$item->t1_month_online? number_format($item->t1_month_online) : '-'}}</td>
                          <td>{{@$item->t1_month_offline_select? number_format($item->t1_month_offline_select) : '-'}}</td>
                          <td>{{@$item->t1_month_offline_mass? number_format($item->t1_month_offline_mass) : '-'}}</td> 
                        </tr>
                      @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
  
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
