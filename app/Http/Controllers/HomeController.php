<?php

namespace App\Http\Controllers;

use App\Models\Actualstock;
use Illuminate\Http\Request;
use App\Models\Sku;
use App\Models\Category;
use App\Models\Mastersku;
use App\Models\Salesdata;
use App\Models\Supplier;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $requestData = $request->all();

        $skudata     = Sku::with('category','supplier','poOrders','mastersku','actualSalesData')->where('status',1)->orderBy('id','ASC')->get();
        $categories  = Category::where('status',1)->pluck('name','id');
        $masterskus  = Mastersku::where('status',1)->pluck('mastersku','id');
        $skus        = Sku::where('status',1)->pluck('name','id');
        $suppliers   = Supplier::where('status',1)->pluck('name','id');
        $top25stock  = DB::table('actualstocks')->join('skus','actualstocks.product_sku_id','=','skus.id')->orderBy('actualstocks.actual_stock','Desc')->take(25)->get();
        $top25sales  = DB::table('skuforecastt1s')->join('skus','skuforecastt1s.product_sku_id','=','skus.id')->orderBy('skuforecastt1s.offline_mass','Desc')->take(25)->get();
        
        if(!empty($requestData))
        {
            
            $category = isset($requestData['category'])?$requestData['category']:"";
          
            $mastersku = isset($requestData['mastersku'])?$requestData['mastersku']:"";
          
            $sku = isset($requestData['skus'])?$requestData['skus']:"";
            
            $supplier = isset($requestData['suppliers'])?$requestData['suppliers']:"";
           
            $skudata = Sku::where('status',1);
            
            if(isset($category) && !empty($category) && $category != '')
            {
                $category = explode(",",$category);
                $skudata->whereIn('category_id',$category);
            }

            if(isset($mastersku) && !empty($mastersku) && $mastersku != '')
            {   
             
                $mastersku = explode(",",$mastersku); 
                $skudata->WhereIn('master_sku_id',$mastersku);
            }
            if(isset($sku) && !empty($sku) && $sku != '')
            {    
                $sku = explode(",",$sku);
                $skudata->WhereIn('id',$sku);
            }
          
            if(isset($supplier) && !empty($supplier))
            {    
                $skudata = Supplier::whereIn('id',$supplier);
            }  
            
            $skudata = $skudata->orderBy('id','DESC')->get();
           
        }
        
        return view('admin/dashboard',compact('categories','masterskus','skus','suppliers','skudata','top25stock','top25sales'));
       // return view('admin/dashboard',compact('skus'));
    }

    public function masterdata(Request $request)
    {
        $requestData = $request->all();

        
        $skudata     = Sku::with('category','supplier','poOrders','mastersku')->where('status',1)->orderBy('id','ASC')->get();
        

        $categories  = Category::where('status',1)->pluck('name','id');
        $masterskus  = Mastersku::where('status',1)->pluck('mastersku','id');
        $skus        = Sku::where('status',1)->pluck('name','id');
        $suppliers   = Supplier::where('status',1)->pluck('name','id');
        $top25stock  = DB::table('actualstocks')->join('skus','actualstocks.product_sku_id','=','skus.id')->orderBy('actualstocks.actual_stock','Desc')->take(25)->get();
        $top25sales  = DB::table('skuforecastt1s')->join('skus','skuforecastt1s.product_sku_id','=','skus.id')->orderBy('skuforecastt1s.offline_mass','Desc')->take(25)->get();
        
        if(!empty($requestData))
        {
            
            $category = isset($requestData['category'])?$requestData['category']:"";
          
            $mastersku = isset($requestData['mastersku'])?$requestData['mastersku']:"";
          
            $sku = isset($requestData['skus'])?$requestData['skus']:"";
            
            $supplier = isset($requestData['suppliers'])?$requestData['suppliers']:"";
           
            $skudata = Sku::where('status',1);
            
            if(isset($category) && !empty($category) && $category != '')
            {
                $category = explode(",",$category);
                $skudata->whereIn('category_id',$category);
            }

            if(isset($mastersku) && !empty($mastersku) && $mastersku != '')
            {   
             
                $mastersku = explode(",",$mastersku); 
                $skudata->WhereIn('master_sku_id',$mastersku);
            }
            if(isset($sku) && !empty($sku) && $sku != '')
            {    
                $sku = explode(",",$sku);
                $skudata->WhereIn('id',$sku);
            }
          
            if(isset($supplier) && !empty($supplier))
            {    
                $skudata = Supplier::whereIn('id',$supplier);
            }  
            
            $skudata = $skudata->orderBy('id','DESC')->get();
           
        }
        
        return view('admin/masterdata',compact('categories','masterskus','skus','suppliers','skudata','top25stock','top25sales'));
       // return view('admin/dashboard',compact('skus'));
    }

    public function fetchforecatdata(Request $request){
        $requestData = $request->all();
        $skus  = Sku::with('currentDateStock','skuPastTwoMonth','skuPastOneMonth','actualSalesData','skuforcastt1','skuforcastt2','skuforcastt3')->where('status',1)->where('id',$requestData['id'])->orderBy('id','ASC')->get();

        if(!empty($skus))
        {
                $html = "<table class='table table-sm responsive'>
                <tr>
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
                <th>T+3 month Offline Mass</th></tr>";
            foreach($skus as $key => $sku){
                $skuPastTwoMonthOnline = @$sku->skuPastTwoMonth->online?number_format($sku->skuPastTwoMonth->online) : '-';
                $skuPastTwoMonthOffline = @$sku->skuPastTwoMonth->offline_select ? number_format($sku->skuPastTwoMonth->offline_select) : '-';
                $skuPastTwoMonthOfflineMass = @$sku->skuPastTwoMonth->offline_mass            ? number_format($sku->skuPastTwoMonth->offline_mass) : '-';
                $skuPastTwoMonthOnline = @$sku->skuPastTwoMonth->online? number_format($sku->skuPastTwoMonth->online) : '-';
                $skuPastTwoMonthOfflineSelect = @$sku->skuPastTwoMonth->offline_select?number_format($sku->skuPastTwoMonth->offline_select) : '-';
                $skuPastTwoMonthOfflineMass = @$sku->skuPastTwoMonth->offline_mass?number_format($sku->skuPastTwoMonth->offline_mass) : '-';
                $actualSalesData = @$sku->actualSalesData()?number_format($sku->actualSalesData()->sum('t_month_online')) : '-';
                $t_month_offline_select = @$sku->actualSalesData()? number_format($sku->actualSalesData()->sum('t_month_offline_select')) : '-';
                $t_month_offline_mass = @$sku->actualSalesData()? number_format($sku->actualSalesData()->sum('t_month_offline_mass')) : '-';
                $skuforcastt1Online = @$sku->skuforcastt1->online? number_format($sku->skuforcastt1->online) : '-';
                $skuforcastt1OfflineSelect = @$sku->skuforcastt1->offline_select?number_format($sku->skuforcastt1->offline_select) : '-';
                $skuforcastt1OfflineMass = @$sku->skuforcastt1->offline_mass? number_format($sku->skuforcastt1->offline_mass) : '-'; 
                $skuforcastt2Online = @$sku->skuforcastt2->online?number_format($sku->skuforcastt2->online) : '-';
                $skuforcastt2OfflineSelect = @$sku->skuforcastt2->offline_select? number_format($sku->skuforcastt2->offline_select) : '-';
                $skuforcastt2OfflineMass = @$sku->skuforcastt2->offline_mass?number_format($sku->skuforcastt2->offline_mass) : '-';
                $skuforcastt3Online = @$sku->skuforcastt3->online? number_format($sku->skuforcastt3->online) : '-';
                $skuforcastt3OfflineSelect = @$sku->skuforcastt3->offline_select? number_format($sku->skuforcastt3->offline_select) : '-';
                $skuforcastt3OfflineMass = @$sku->skuforcastt3->offline_mass? number_format($sku->skuforcastt3->offline_mass) : '-';
                
                $html .= "<td>".$skuPastTwoMonthOnline."</td>
                <td>".$skuPastTwoMonthOffline."</td>
                <td>".$skuPastTwoMonthOfflineMass."</td>  
                <td>".$skuPastTwoMonthOnline."</td>
                <td>".$skuPastTwoMonthOfflineSelect."</td>
                <td>".$skuPastTwoMonthOfflineMass."</td>    
                <td>".$actualSalesData."</td>
                <td>".$t_month_offline_select."</td>
                <td>".$t_month_offline_mass."</td>    
                <td>".$skuforcastt1Online."</td>
                <td>".$skuforcastt1OfflineSelect."</td>
                <td>".$skuforcastt1OfflineMass."</td>
                <td>".$skuforcastt2Online."</td>
                <td>".$skuforcastt2OfflineSelect."</td>
                <td>".$skuforcastt2OfflineMass."</td>
                <td>".$skuforcastt3Online."</td>
                <td>".$skuforcastt3OfflineSelect."</td>
                <td>".$skuforcastt3OfflineMass."</td>";
            }    
        }
        echo $html;
    }

    public function fetchactualdataMaster(Request $request){
        $requestData = $request->all();
        $skus  = Sku::with('currentDateStock','skuPastTwoMonth','skuPastOneMonth','actualSalesData','skuforcastt1','skuforcastt2','skuforcastt3')->where('status',1)->where('id',$requestData['id'])->orderBy('id','ASC')->get();

        if(!empty($skus))
        {
                $html = "<table class='table table-sm responsive'>
                <tr>
                <th>M-2 month Online</th>
                <th>M-1 month Online</th>
                <th>M month Online</th>
                </tr>";
            foreach($skus as $key => $sku){
                $skuPastTwoMonthOnline = @$sku->skuPastTwoMonth->online?number_format($sku->skuPastTwoMonth->online) : '-';
                $skuPastTwoMonthOnline = @$sku->skuPastTwoMonth->online? number_format($sku->skuPastTwoMonth->online) : '-';
                $actualSalesData = @$sku->actualSalesData()?number_format($sku->actualSalesData()->sum('t_month_online')) : '-';
                
                $html .= "<td>".$skuPastTwoMonthOnline."</td>
                <td>".$skuPastTwoMonthOnline."</td>
                <td>".$actualSalesData."</td>";
            }    
        }
        echo $html;
    }

    public function fetchaforecastMaster(Request $request){
        $requestData = $request->all();
        $skus  = Sku::with('currentDateStock','skuPastTwoMonth','skuPastOneMonth','actualSalesData','skuforcastt1','skuforcastt2','skuforcastt3')->where('status',1)->where('id',$requestData['id'])->orderBy('id','ASC')->get();

        if(!empty($skus))
        {
                $html = "<table class='table table-sm responsive'>
                <tr>
                <th>M1 month Online</th>
                <th>M1 month Offline</th>
                <th>M2 month Online</th>
                <th>M2 month Offline</th>
                <th>M3 month Online</th>
                <th>M3 month Offline</th>
                </tr>";
            foreach($skus as $key => $sku){
                $skuforcastt1Online = @$sku->skuforcastt1->online? number_format($sku->skuforcastt1->online) : '-';
                $skuforcastt1OfflineSelect = @$sku->skuforcastt1->offline_select?number_format($sku->skuforcastt1->offline_select) : '-';
                $skuforcastt1OfflineMass = @$sku->skuforcastt1->offline_mass? number_format($sku->skuforcastt1->offline_mass) : '-'; 
                $skuforcastt2Online = @$sku->skuforcastt2->online?number_format($sku->skuforcastt2->online) : '-';
                $skuforcastt2OfflineSelect = @$sku->skuforcastt2->offline_select? number_format($sku->skuforcastt2->offline_select) : '-';
                $skuforcastt2OfflineMass = @$sku->skuforcastt2->offline_mass?number_format($sku->skuforcastt2->offline_mass) : '-';
                $skuforcastt3Online = @$sku->skuforcastt3->online? number_format($sku->skuforcastt3->online) : '-';
                $skuforcastt3OfflineSelect = @$sku->skuforcastt3->offline_select? number_format($sku->skuforcastt3->offline_select) : '-';
                $skuforcastt3OfflineMass = @$sku->skuforcastt3->offline_mass? number_format($sku->skuforcastt3->offline_mass) : '-';

                
                $html .= "<td>".$skuforcastt1Online."</td>
                <td>".$skuforcastt1OfflineSelect."</td>
                <td>".$skuforcastt2Online."</td>
                <td>".$skuforcastt2OfflineSelect."</td>
                <td>".$skuforcastt3Online."</td>
                <td>".$skuforcastt3OfflineSelect."</td>";
            }    
        }
        echo $html;
    }

    public function fetch_dropdown_data(Request $request){
        $requestData = $request->all();
        $category_id = $requestData['id'];
        $html='';
        $skuhtml = '';
        if(count($category_id)>0)
        {
           
            $mastersku = Mastersku::whereIn('category_id',$category_id)->orderBy('mastersku')->pluck('mastersku','id');
            $sku = Sku::whereIn('category_id',$category_id)->orderBy('name')->pluck('name','id');
          
            if(!empty($mastersku)){
                foreach($mastersku as $key=>$item)
                {
                    $html .= '<option value='.$key.'>'.$item.'</option>';
                }     
            }
            else{
                $html .= 'No Data Found';
            }

            if(!empty($sku)){
                foreach($sku as $key=>$item)
                {
                    $skuhtml .= '<option value='.$key.'>'.$item.'</option>';
                }     
            }
            else{
                $skuhtml .= 'No Data Found';
            }
        }

        echo json_encode(array($html, $skuhtml));
    }

    public function filterColumns(Request $request)
    {
        // Get the selected columns from the request
        $selectedColumns = $request->input('columns');

        // Store the selected columns in the session or database if needed
        // For simplicity, we'll use the session here
        session(['selectedColumns' => $selectedColumns]);

        return response()->json(['success' => true]);
    }
}
