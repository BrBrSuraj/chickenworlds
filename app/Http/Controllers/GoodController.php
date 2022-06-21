<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeGoodRequest;
use App\Http\Requests\UpdateGoodRequest;
use App\Models\Good;
use App\Models\Product;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('is_Manager');
        $goods=Good::latest()->paginate();
        return view('good.index',compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('is_Manager');
        $products=Product::latest()->paginate();
        return view('good.create',\compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeGoodRequest $request)
    {
        $this->authorize('is_Manager');
        Good::create($request->validated());
        return redirect()->route('goods.index')->with('message','Goods Set Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $good)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $good)
    {

        $this->authorize('is_Manager');
        return view('good.edit',compact('good'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGoodRequest $request, Good $good)
    {
        $this->authorize('is_Manager');
        $good->update($request->validated());
        return redirect()->route('goods.index')->with('message','Good Updated Successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        $this->authorize('is_Manager');
       $good->delete();
        return redirect()->route('goods.index')->with('message', 'Good Deleted Successfuly.');

    }
}
