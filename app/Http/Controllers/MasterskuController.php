<?php

namespace App\Http\Controllers;

use App\Models\Mastersku;
use App\Models\Category;
use App\Http\Requests\StoreMasterskuRequest;
use App\Http\Requests\UpdateMasterskuRequest;
use Illuminate\Http\Request;

class MasterskuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->authorizeResource(Mastersku::class);
    }

    public function index(Request $request)
    {
        
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $masterskus = Mastersku::where('name', 'LIKE', "%$keyword%")
            ->latest()->paginate($perPage);
        } else {
            $masterskus = Mastersku::latest()->paginate($perPage);
        }

        return view('admin.masterskus.index', compact('masterskus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status',1)->get();
        return view('admin.masterskus.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMasterskuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasterskuRequest $request)
    {
        $requestData = $request->all();
       
        for($i=0;$i<count($requestData['mastersku']);$i++)
        {
            
            Mastersku::create([
                'category_id' => $requestData['category_id'],
                'mastersku'=> $requestData['mastersku'][$i]['mastersku'],
            ]);
        }
        return redirect('mastersku')->with('success', 'Master Sku updated!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mastersku  $mastersku
     * @return \Illuminate\Http\Response
     */
    public function show(Mastersku $mastersku)
    {
        return view('admin.masterskus.show', compact('mastersku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mastersku  $mastersku
     * @return \Illuminate\Http\Response
     */
    public function edit(Mastersku $mastersku)
    {
        $category = Category::where('status',1)->get();
        return view('admin.masterskus.edit', compact('mastersku','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMasterskuRequest  $request
     * @param  \App\Models\Mastersku  $mastersku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasterskuRequest $request, Mastersku $mastersku)
    {
            $requestData = $request->all();
            $mastersku ->update($requestData);
            return redirect('mastersku')->with('success', 'Master Sku updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mastersku  $mastersku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mastersku $mastersku)
    {
        $mastersku ->delete();
        return redirect('mastersku')->with('success', 'Master Sku deleted!');
    }

    public function removeMasterSku(Request $request){
        $id             = $request->data_id;
        $mastersku      = Mastersku::findOrfail($id);
        
        return response()->json(["status"=>"Done","message"=>"Successful"]);
    }
}
