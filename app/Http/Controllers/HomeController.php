<?php

namespace App\Http\Controllers;

use App\Models\Actualstock;
use Illuminate\Http\Request;
use App\Models\Sku;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $skus  = Sku::with('category','supplier','mastersku','currentDateStock','skuPastTwoMonth','skuPastOneMonth','actualSalesData','skuforcastt1','skuforcastt2','skuforcastt3')->where('status',1)->orderBy('id','ASC')->get();

        return view('admin/dashboard',compact('skus'));
    }
}
