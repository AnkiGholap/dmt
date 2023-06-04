<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Sku extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier','supplier_id','id');
    }

    public function mastersku()
    {
        return $this->belongsTo('App\Models\Mastersku','master_sku_id','id');
    }

    public function currentDateStock()
    {
        $currentTime = date('H:i');
        if($currentTime > '12:15')
        {
            $date = date('Y-m-d');
        }
        else
        {
            $date = date('Y-m-d',strtotime("-1 days"));
        }

        return $this->hasOne('App\Models\Actualstock','product_sku_id','id')->whereDate('created_at',$date);
    }


    public function actualSalesData()
    {
        $currentTime = date('H:i');
        if($currentTime > '12:15')
        {
            $date = Carbon::yesterday();
        }
        else
        {
            $date = Carbon::yesterday()->subDay();            
        }
        return $this->hasOne('App\Models\Salesdata','product_sku_id','id')->where('date',$date->day)->where('month',$date->month)->where('year',$date->year);
    }

    public function skuforcastt1()
    {
        $date = Carbon::today()->addMonthsNoOverflow(1);
        return $this->hasOne('App\Models\Skuforecastt1','product_sku_id','id')->where('month',$date->month)->where('year',$date->year);
    }

    public function skuforcastt2()
    {
        $date = Carbon::today()->addMonthsNoOverflow(2);
        return $this->hasOne('App\Models\Skuforecastt1','product_sku_id','id')->where('month',$date->month)->where('year',$date->year);
    }

    public function skuforcastt3()
    {
        $date = Carbon::today()->addMonthsNoOverflow(3);
        return $this->hasOne('App\Models\Skuforecastt1','product_sku_id','id')->where('month',$date->month)->where('year',$date->year);
    }
}
