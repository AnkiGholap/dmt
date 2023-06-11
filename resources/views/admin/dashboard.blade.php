
  @extends('admin.layouts.master')
  @section('content')
  <style>
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
  @section('title', 'Dashboard')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href=""#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">          
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
        

          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><span class="dropdown-text">Apply Filter</span>
           
            <ul class="dropdown-menu">
              <li><a class="toggle-vis" data-column="0"><label><input type="checkbox"  class="selectall" />Sku Code</label></a></li>
              <li><a class="toggle-vis" data-column="1"><label><input type="checkbox"  class="selectall" />Item Name</label></a></li>
              <li><a class="toggle-vis" data-column="0"><label><input type="checkbox"  class="selectall" />Tags</label></a></li>
              <li><a class="toggle-vis" data-column="0"><label><input type="checkbox"  class="selectall" />Category</label></a></li>
              <li><a class="toggle-vis" data-column="0"><label><input type="checkbox"  class="selectall" />Supplier</label></a></li>
              <li><a class="toggle-vis" data-column="0"><label><input type="checkbox"  class="selectall"  />Master SKU</label></a></li>
              <li><a class="toggle-vis" data-column="0"><label><input type="checkbox"  class="selectall" />MRP</label></a></li>
              <li><a class="toggle-vis" data-column="0"><label><input type="checkbox"  class="selectall" />Covered</label></a></li>
              <li><a class="toggle-vis" data-column="0"><label><input type="checkbox"  class="selectall" />Stock To Be Maintained</label></a></li>
              <li><a class="toggle-vis" data-column="0"><label><input type="checkbox"  class="selectall" />Actual Stock</label></a></li>
            </ul>
          </div>
          
          <!-- Add more checkboxes for each column you want to filter/hide/show -->
       
        <table id="data-table">
          <thead>
          <tr>
            <th>SKU Code</th>
            <th>Item Name</th>
            <th>Tags</th>
            <th>Category</th>
            <th>Supplier</th>
            <th>Master SKU</th>
            <th>MRP</th>
            <th>Cover</th>
            <th>Stock To Be Maintained</th>
            <th>Actual Stock</th>
            {{-- <th>PO expected to arrive in 15 Days</th>
            <th>Stock Excess / Shortage</th>
            <th>Open PO Qty</th>
            <th>Next Inbound Quantity</th>
            <th>Next Inbound Date</th>
            <th>T-2 month Online</th>
            <th>T-2 month Offline Select</th>
            <th>T-2 month Offline Mass</th>
            <th>T-1 month Online</th>
            <th>T-1 month Offline Select</th>
            <th>T-1 month Offline Mass</th>
            <th>T month Online</th>
            <th>T month Offline Select</th>
            <th>T month Offline Mass</th>
            <th>T+1 month Online</th>
            <th>T+1 month Offline Select</th>
            <th>T+1 month Offline Mass</th>
            <th>T+2 month Online</th>
            <th>T+2 month Offline Select</th>
            <th>T+2 month Offline Mass</th>
            <th>T+3 month Online</th>
            <th>T+3 month Offline Select</th>
            <th>T+3 month Offline Mass</th>
            <th>Remarks</th> --}}
          </tr>
        </thead>
        <tbody>
          @php 
            $srNo = 1;
          @endphp
          @foreach($skus as $key => $sku)
            <tr>
               <td>{{$sku->sku_code ? $sku->sku_code : '-' }}</td>
               <td>{{$sku->name ? $sku->name :'-' }}</td>

               <td>TAGS</td>

               <td>{{@$sku->category->name ? $sku->category->name : '-'}}</td>
               <td>{{@$sku->supplier->name ? $sku->supplier->name : '-'}}</td>
               <td>{{@$sku->mastersku->mastersku ? $sku->mastersku->mastersku : '-'}}</td>
               <td>{{@$sku->price ? $sku->price : '-' }}</td>

               <td>COVER</td>
               <td>STBM</td>

               <td>{{@$sku->currentDateStock->actual_stock ? number_format($sku->currentDateStock->actual_stock) : '-'}}</td>

               {{-- <td>K</td>
    <td>L</td>
    <td>M</td>
    <td>N</td>
    <td>O</td>

    <td>{{@$sku->skuPastTwoMonth->online                  ? number_format($sku->skuPastTwoMonth->online) : '-'}}</td>
    <td>{{@$sku->skuPastTwoMonth->offline_select          ? number_format($sku->skuPastTwoMonth->offline_select) : '-'}}</td>
    <td>{{@$sku->skuPastTwoMonth->offline_mass            ? number_format($sku->skuPastTwoMonth->offline_mass) : '-'}}</td>  

    <td>{{@$sku->skuPastTwoMonth->online                  ? number_format($sku->skuPastTwoMonth->online) : '-'}}</td>
    <td>{{@$sku->skuPastTwoMonth->offline_select          ? number_format($sku->skuPastTwoMonth->offline_select) : '-'}}</td>
    <td>{{@$sku->skuPastTwoMonth->offline_mass            ? number_format($sku->skuPastTwoMonth->offline_mass) : '-'}}</td>    

    <td>{{@$sku->actualSalesData()                        ? number_format($sku->actualSalesData()->sum('t_month_online')) : '-'}}</td>
    <td>{{@$sku->actualSalesData()                        ? number_format($sku->actualSalesData()->sum('t_month_offline_select')) : '-'}}</td>
    <td>{{@$sku->actualSalesData()                        ? number_format($sku->actualSalesData()->sum('t_month_offline_mass')) : '-'}}</td>    

    <td>{{@$sku->skuforcastt1->online                     ? number_format($sku->skuforcastt1->online) : '-'}}</td>
    <td>{{@$sku->skuforcastt1->offline_select             ? number_format($sku->skuforcastt1->offline_select) : '-'}}</td>
    <td>{{@$sku->skuforcastt1->offline_mass               ? number_format($sku->skuforcastt1->offline_mass) : '-'}}</td>

    <td>{{@$sku->skuforcastt2->online                     ? number_format($sku->skuforcastt2->online) : '-'}}</td>
    <td>{{@$sku->skuforcastt2->offline_select             ? number_format($sku->skuforcastt2->offline_select) : '-'}}</td>
    <td>{{@$sku->skuforcastt2->offline_mass               ? number_format($sku->skuforcastt2->offline_mass) : '-'}}</td>

    <td>{{@$sku->skuforcastt3->online                     ? number_format($sku->skuforcastt3->online) : '-'}}</td>
    <td>{{@$sku->skuforcastt3->offline_select             ? number_format($sku->skuforcastt3->offline_select) : '-'}}</td>
    <td>{{@$sku->skuforcastt3->offline_mass               ? number_format($sku->skuforcastt3->offline_mass) : '-'}}</td>
    <td></td> --}}               
            </tr>
          @endforeach
          </tbody>
        </table>

        <!-- /.row -->

        <!-- Main row -->
       
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('scripts')
    

    
@endsection