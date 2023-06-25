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

        $skudata= Sku::with('category','supplier','poOrders','mastersku','currentDateStock','skuPastTwoMonth','skuPastOneMonth','actualSalesData','skuforcastt1','skuforcastt2','skuforcastt3')->where('status',1)->orderBy('id','ASC')->get();
        $categories = Category::where('status',1)->pluck('name','id');
        $masterskus = Mastersku::where('status',1)->pluck('mastersku','id');
        $skus = Sku::where('status',1)->pluck('name','id');
        $suppliers = Supplier::where('status',1)->pluck('name','id');
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

        $skudata     = Sku::with('category','supplier','poOrders','mastersku','currentDateStock','skuPastTwoMonth','skuPastOneMonth','actualSalesData','skuforcastt1','skuforcastt2','skuforcastt3')->where('status',1)->orderBy('id','ASC')->get();
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

            if(isset($skus) && !empty($skus) && $skus != '')
            {    
                $skus = explode(",",$skus);
                $skudata->WhereIn('id',$skus);
            }

            if(isset($suppliers) && !empty($suppliers))
            {    
                $skudata = Supplier::whereIn('id',$suppliers);
            }  
            
            $skudata = $skudata->orderBy('id','DESC')->get();
           
        }
        
        return view('admin/dashboard',compact('categories','masterskus','skus','suppliers','skudata','top25stock','top25sales'));
       // return view('admin/dashboard',compact('skus'));
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
