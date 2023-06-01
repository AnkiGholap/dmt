<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\Skuforcastt2;
use App\Models\Sku;
use Illuminate\Http\Request;
use Excel;
use App\Imports\Skuforcastt2Import;
use Carbon\Carbon;

class Skuforcastt2Controller extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Skuforecastt2::class);
    }

    
    public function sku_forecast_t2_import()
    {
        return view('admin.import_skuforecastt2');
    }

    public function sku_forecast_t2_save(Request $request)
    {      
        if($request->file('file'))
        {
            $datas = Excel::toArray(new Skuforcastt2Import, $request->file);
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
                    $m = Carbon::now()->month+2;
                    $y = date('Y');
                    $Skuforecastt2 = Skuforcastt2::where('product_sku_id',@Sku::where('sku_code',$v[1])->first()->id)->first();
                        
                    if(!$Skuforecastt2)
                    {
                        $Skuforecastt2 = new Skuforcastt2;
                    }
                    else
                    {
                        $id = $Skuforecastt2->id;
                    }
                    
                    $Skuforecastt2->id = $v[0];
                    $Skuforecastt2->product_sku_id = @Sku::where('sku_code',$v[1])->first()->id;
                    $Skuforecastt2->t2_month_online = $v[2];
                    $Skuforecastt2->t2_month_offline_select = $v[3];
                    $Skuforecastt2->t2_month_offline_mass = $v[4];
                    $Skuforecastt2->date = $d;
                    $Skuforecastt2->month = $m;
                    $Skuforecastt2->year = $y;
                                                    
                    if($id == 0)
                    {
                        $Skuforecastt2->save();
                    }
                    else
                    {
                        $Skuforecastt2->update();
                    }
                }    
            }        
            return redirect()->route('skuForeCastT2Import')->with('success', 'Sku forecast for T2 Imported!');
        }
        catch(\Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', $e);
        }  
    }
}
