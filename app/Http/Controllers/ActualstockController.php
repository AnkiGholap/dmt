<?php

namespace App\Http\Controllers;

use App\Models\Actualstock;
use App\Models\Sku;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Excel;
use App\Imports\ImportActualStock;
use Carbon\Carbon;

class ActualstockController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Actualstock::class);
    }

    
    public function actualstock_import()
    {
        return view('admin.import_actualstock');
    }

    public function actual_stock_save(Request $request)
    {      
        if($request->file('file'))
        {
            $datas = Excel::toArray(new ImportActualStock, $request->file);
        }   
        else
        {
            return redirect()->back()->with('errors', 'Please Enter Proper File Format');
        } 

        try
        {
            $date = Carbon::today();
            foreach($datas[0] as $k => $v)
            {  
               
                if($k != 0)
                {  
                    // $id = 0;
                    // $actualStock = Actualstock::where('date',$v[3])->where('month', $v[4])->where('year',$v[5])->first();
                        
                    // if(!$actualStock)
                    // {
                    //     $actualStock = new Actualstock;
                    // }
                    // else
                    // {
                    //     $id = $actualStock->id;
                    // }
                    
                    $actualStock = new Actualstock;
                    $actualStock->product_sku_id = @Sku::where('sku_code',$v[1])->first()->id;
                    $actualStock->actual_stock   = $v[2];
                    $actualStock->date           = $date->day;
                    $actualStock->month          = $date->month;
                    $actualStock->year           = $date->year;
                   
                                                    
                    // if($id == 0)
                    // {
                        $actualStock->save();
                    // }
                    // else
                    // {
                    //     $actualStock->update();
                    // }
                }    
            }        
            // return redirect()->route('actualStockImport')->with('success', 'Actual Stock Data Imported!');
            return redirect()->route('upload')->with('success', 'Sku forecast Imported Successfully!');
        }
        catch(\Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', $e);
        }  
    }
}
