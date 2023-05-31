<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mastersku extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function sku()
    {
        return $this->belongsTo('App\Models\Sku','master_sku_id','id');
    }

}
