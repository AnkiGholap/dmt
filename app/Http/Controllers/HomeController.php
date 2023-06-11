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

    public function filterColumns(Request $request)
    {
        // Get the selected columns from the request
        $selectedColumns = $request->input('columns');

        // Store the selected columns in the session or database if needed
        // For simplicity, we'll use the session here
        session(['selectedColumns' => $selectedColumns]);

        return response()->json(['success' => true]);
    }
}
