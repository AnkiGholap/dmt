<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchaseorder extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function sku()
    {
        return $this->belongsTo('App\Models\Sku','product_sku_id');
    }
}
