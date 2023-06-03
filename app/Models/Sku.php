<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function skuforcastt1()
    {
        return $this->hasOne('App\Models\Skuforecastt1','product_sku_id','id')->where('month',date('m'))->where('year',date('Y'));
    }

    public function skuforcastt2()
    {
        return $this->hasOne('App\Models\Skuforcastt2','product_sku_id','id')->where('month',date('m'))->where('year',date('Y'));
    }

    public function skuforcastt3()
    {
        return $this->hasOne('App\Models\Skuforcastt3','product_sku_id','id')->where('month',date('m'))->where('year',date('Y'));
    }
}
