<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function mastersku()
    {
        return $this->hasMany('App\Models\Mastersku','category_id','id');
    }

    public function sku()
    {
        return $this->hasMany('App\Models\Sku','category_id','id');
    }


}
