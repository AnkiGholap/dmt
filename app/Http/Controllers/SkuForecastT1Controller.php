<?php

namespace App\Http\Controllers;
use App\Models\Salesdata;
use App\Models\Sku;
use App\Models\Skuforecastt1;
use Illuminate\Http\Request;
use Excel;
use App\Imports\ImportSkuForeCastT1;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SkuForecastT1Controller extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Skuforecastt1::class);
    }

    
    public function sku_forecast_t1_import()
    {
        return view('admin.import_skuforecastt1new');
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
            $day   = date('d');
            $month = $request->month;
            $year  = $request->year;

            foreach($datas[0] as $k => $v)
            {                 
                if($k != 0)
                {  
                    foreach ($v as $value) 
                    {
                        if (!is_numeric($value) || floor($value) != $value) 
                        {                          
                            return redirect()->back()->withErrors(['message' => 'Invalid data: Please check excel data before uploading']);    
                        }
                    }
                   
                    // $Skuforecastt1 = Skuforecastt1::where('product_sku_id',@Sku::where('sku_code',$v[1])->first()->id)->first();
                        
                    // if(!$Skuforecastt1)
                    // {
                        // $Skuforecastt1 = new Skuforecastt1;
                    // }
                    // else
                    // {
                    //     $id = $Skuforecastt1->id;
                    // }

                    $Skuforecastt1 = new Skuforecastt1;
                    
                    $Skuforecastt1->id             = $v[0];
                    $Skuforecastt1->product_sku_id = @Sku::where('sku_code',$v[1])->first()->id;
                    $Skuforecastt1->online         = $v[2];
                    $Skuforecastt1->offline_select = $v[3];
                    $Skuforecastt1->offline_mass   = $v[4];
                    $Skuforecastt1->date           = $day;
                    $Skuforecastt1->month          = $month;
                    $Skuforecastt1->year           = $year;
                                                    
                    $Skuforecastt1->save();
                }    
            }        
            //return redirect()->route('skuForeCastT1Import')->with('success', 'Sku forecast Imported Successfully!');
            return redirect()->route('upload')->with('success', 'Sku forecast Imported Successfully!');
        }
        catch(\Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', $e);
        }  
    }
}
