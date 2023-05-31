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
        return $this->hasMany('App\Models\Category','category_id','id');
    }

    public function supplier()
    {
        return $this->hasMany('App\Models\Supplier','supplier_id','id');
    }

    public function mastersku()
    {
        return $this->hasMany('App\Models\Mastersku','master_sku_id','id');
    }
}
