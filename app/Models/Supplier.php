<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function sku()
    {
        return $this->belongsTo('App\Models\Sku','supplier_id','id');
    }

}
