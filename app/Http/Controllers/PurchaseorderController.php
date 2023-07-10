<?php

namespace App\Http\Controllers;

use App\Models\Purchaseorder;
use App\Models\Sku;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePurchaseorderRequest;
use App\Http\Requests\UpdatePurchaseorderRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PurchaseorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->authorizeResource(Purchaseorder::class);
    }


    public function index(Request $request)
    {
        //
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $purchaseorders = Purchaseorder::where('name', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
        } else {
            $purchaseorders = Purchaseorder::latest()->paginate($perPage);
        }

        return view('admin.purchaseorders.index', compact('purchaseorders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sku = Sku::where('status',1)->get();
        return view('admin.purchaseorders.create',compact('sku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseorderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseorderRequest $request)
    {
        $requestData = $request->all();
        $date = Carbon::today();
        $requestData['date']           = $date->day;
        $requestData['month']          = $date->month;
        $requestData['year']           = $date->year;
        Purchaseorder::create($requestData);

        return redirect('purchaseorders')->with('success', 'PO added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchaseorder  $purchaseorder
     * @return \Illuminate\Http\Response
     */
    public function show(Purchaseorder $purchaseorder)
    {
        return view('admin.purchaseorders.show', compact('purchaseorder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchaseorder  $purchaseorder
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchaseorder $purchaseorder)
    {
        $sku = Sku::where('status',1)->get();
        return view('admin.purchaseorders.edit', compact('purchaseorder','sku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseorderRequest  $request
     * @param  \App\Models\Purchaseorder  $purchaseorder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchaseorderRequest $request, Purchaseorder $purchaseorder)
    {
        $requestData = $request->all();
        $purchaseorder ->update($requestData);

        return redirect('purchaseorders')->with('success', 'PO updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchaseorder  $purchaseorder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchaseorder $purchaseorder)
    {
        $purchaseorder ->delete();
        return redirect('purchaseorders')->with('success', 'PO deleted!');
    }
}
