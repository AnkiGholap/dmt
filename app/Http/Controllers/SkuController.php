<?php

namespace App\Http\Controllers;

use App\Models\Sku;
use App\Models\Category;
use App\Models\Mastersku;
use App\Models\Supplier;
use App\Http\Requests\StoreSkuRequest;
use App\Http\Requests\UpdateSkuRequest;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $skus = Sku::where('name', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
        } else {
            $skus = Sku::latest()->paginate($perPage);
        }

        return view('admin.skus.index', compact('skus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::where('status',1)->get();
        $supplier = Supplier::where('status',1)->get();
        $mastersku = Mastersku::where('status',1)->get();
        return view('admin.skus.create', compact('category','supplier','mastersku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSkuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkuRequest $request)
    {
        $requestData = $request->all();
        
        sku::create($requestData);

        return redirect('skus')->with('success', 'Skus data added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function show(Sku $sku)
    {
        return view('admin.skus.show', compact('sku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function edit(Sku $sku)
    {
        $category = Category::where('status',1)->get();
        $supplier = Supplier::where('status',1)->get();
        $mastersku = Mastersku::where('status',1)->get();
        return view('admin.skus.edit', compact('category','supplier','mastersku','sku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSkuRequest  $request
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkuRequest $request, Sku $sku)
    {
        $requestData = $request->all();

        $sku->update($requestData);

        return redirect('skus')->with('success', 'Skus updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sku $sku)
    {
        $sku->delete();
        return redirect('skus')->with('success', 'Sku data deleted!');
    }
}
