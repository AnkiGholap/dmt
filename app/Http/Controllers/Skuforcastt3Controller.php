<?php

namespace App\Http\Controllers;

use App\Models\Skuforcastt3;
use App\Models\Sku;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkuforcastt3Request;
use App\Http\Requests\UpdateSkuforcastt3Request;
use Illuminate\Http\Request;
use Excel;
use App\Imports\ImportSkuForeCastT3;
use Carbon\Carbon;

class Skuforcastt3Controller extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Skuforecastt1::class);
    }

    
    public function sku_forecast_t3_import()
    {
        return view('admin.import_skuforecastt3');
    }

    public function sku_forecast_t3_save(Request $request)
    {      
        if($request->file('file'))
        {
            $datas = Excel::toArray(new ImportSkuForeCastT3, $request->file);
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
                    foreach ($v as $value) {
                        if (!is_numeric($value) || floor($value) != $value) {
                           
                            return redirect()->back()->withErrors(['message' => 'Invalid data: Please check excel data before uploading']);
    
                        }
                    }
                    $id = 0;
                    $d = date('d');
                    $m = Carbon::now()->month+3;
                    $y = date('Y');
                    $Skuforecastt1 = Skuforcastt3::where('product_sku_id',@Sku::where('sku_code',$v[1])->first()->id)->first();
                        
                    if(!$Skuforecastt1)
                    {
                        $Skuforecastt1 = new Skuforcastt3;
                    }
                    else
                    {
                        $id = $Skuforecastt1->id;
                    }
                    
                    $Skuforecastt1->id = $v[0];
                    $Skuforecastt1->product_sku_id = @Sku::where('sku_code',$v[1])->first()->id;
                    $Skuforecastt1->t3_month_online = $v[2];
                    $Skuforecastt1->t3_month_offline_select = $v[3];
                    $Skuforecastt1->t3_month_offline_mass = $v[4];
                    $Skuforecastt1->date = $d;
                    $Skuforecastt1->month = $m;
                    $Skuforecastt1->year = $y;
                                                    
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
            return redirect()->route('skuForeCastT3Import')->with('success', 'Sku forecast for T3 Imported!');
        }
        catch(\Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', $e);
        }  
    }
}
