<?php

namespace App\Http\Controllers;
use App\Models\Salesdata;
use App\Models\Sku;
use App\Models\Skuforecastt1;
use Illuminate\Http\Request;
use Excel;
use App\Imports\ImportSalesData;
use App\Imports\ImportSkuForeCastT1;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;

class SalesdataController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Salesdata::class);
    }

    public function sales_data_import()
    {
        return view('admin.import_salesdata');
    }

    public function sales_data_save(Request $request)
    {      

        
        if($request->file('file'))
        {
            $datas = Excel::toArray(new ImportSalesData, $request->file);
        }   
        else
        {
            return redirect()->back()->with('errors', 'Please Enter Proper File Format');
        } 

        try
        {
            foreach($datas[0] as $k => $v)
            {  
                foreach ($v as $value) {
                    if (!is_numeric($value) || floor($value) != $value) {
                       
                        return redirect()->back()->withErrors(['message' => 'Invalid data: Please check excel data before uploading']);

                    }
                }
               
                if($k != 0)
                {   
                    $d = date('d');
                    $m = Carbon::now()->month;
                    $y = date('Y');
                    $id = 0;
                    $salesData = Salesdata::where('product_sku_id',@Sku::where('sku_code',$v[1])->first()->id)->first();
                        
                    if(!$salesData)
                    {
                        $salesData = new Salesdata;
                    }
                    else
                    {
                        $id = $salesData->id;
                    }
                    
                    $salesData->id = $v[0];
                    $salesData->product_sku_id = @Sku::where('sku_code',$v[1])->first()->id;
                    $salesData->t2_month_online = $v[2];
                    $salesData->t2_month_offline_select = $v[3];
                    $salesData->t2_month_offline_mass = $v[4];
                    $salesData->t1_month_online = $v[5];
                    $salesData->t1_month_offline_select = $v[6];
                    $salesData->t1_month_offline_mass = $v[7];
                    $salesData->t_month_online = $v[8];
                    $salesData->t_month_offline_select = $v[9];                   
                    $salesData->t_month_offline_mass = $v[10];
                    $salesData->date = $d;
                    $salesData->month = $m;
                    $salesData->year = $y;
                                                    
                    if($id == 0)
                    {
                        $salesData->save();
                    }
                    else
                    {
                        $salesData->update();
                    }
                }    
            }        
            return redirect()->route('salesDataImport')->with('success', 'salesDatas Imported!');
        }
        catch(\Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', $e);
        }  
    }

    public function sku_forecast_t1_import()
    {
        return view('admin.import_skuforecastt1');
    }

    public function sku_forecast_t1_save(Request $request)
    {      
        if($request->file('file'))
        {
            $datas = Excel::toArray(new ImportSkuForeCastT1, $request->file);
        }   
        else
        {
            return redirect()->back()->with('errors', 'Please Enter Proper File Format');
        } 

        try
        {
            foreach($datas[0] as $k => $v)
            {  
               
                if($k != 0)
                {   
                    $d = date('d');
                    $m = Carbon::now()->month+2;
                    $y = date('Y');
                    $id = 0;
                    $Skuforecastt1 = Skuforecastt1::where('date',$v[4])->where('month', $v[5])->where('year',$v[6])->first();
                        
                    if(!$Skuforecastt1)
                    {
                        $Skuforecastt1 = new Skuforecastt1;
                    }
                    else
                    {
                        $id = $Skuforecastt1->id;
                    }
                    
                    $Skuforecastt1->id = $v[0];
                    $Skuforecastt1->t1_month_online = $v[1];
                    $Skuforecastt1->t1_month_offline_select = $v[2];
                    $Skuforecastt1->t1_month_offline_mass = $v[3];
                    $Skuforecastt1->date = $v[4];
                    $Skuforecastt1->month = $v[5];
                    $Skuforecastt1->year = $v[6];
                                                    
                    if($id == 0)
                    {
                        $Skuforecastt1->save();
                    }
                    else
                    {
                        $Skuforecastt1->update();
                    }
                }    
            }        
            return redirect()->route('skuForeCastT1Import')->with('success', 'Sku forecast for T1 Imported!');
        }
        catch(\Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', $e);
        }  
    }
}
