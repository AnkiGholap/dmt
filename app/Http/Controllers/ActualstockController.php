<?php

namespace App\Http\Controllers;

use App\Models\Actualstock;
use App\Models\Sku;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Excel;
use App\Imports\ImportActualStock;

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
            foreach($datas[0] as $k => $v)
            {  
               
                if($k != 0)
                {   
                    // foreach ($v as $value) {
                    //     if (!is_numeric($value) || floor($value) != $value) {
                           
                    //         return redirect()->back()->withErrors(['message' => 'Invalid data: Please check excel data before uploading']);
    
                    //     }
                    // }
                    $id = 0;
                    $actualStock = Actualstock::where('date',$v[3])->where('month', $v[4])->where('year',$v[5])->first();
                        
                    if(!$actualStock)
                    {
                        $actualStock = new Actualstock;
                    }
                    else
                    {
                        $id = $actualStock->id;
                    }
                    
                    $actualStock->id = $v[0];
                    $actualStock->product_sku_id = @Sku::where('sku_code',$v[1])->first()->id;
                    $actualStock->actual_stock = $v[2];
                    $actualStock->date = $v[3];
                    $actualStock->month = $v[4];
                    $actualStock->year = $v[5];
                   
                                                    
                    if($id == 0)
                    {
                        $actualStock->save();
                    }
                    else
                    {
                        $actualStock->update();
                    }
                }    
            }        
            return redirect()->route('actualStockImport')->with('success', 'Actual Stock Imported!');
        }
        catch(\Exception $e)
        {
            dd($e);
            return redirect()->back()->with('error', $e);
        }  
    }
}
