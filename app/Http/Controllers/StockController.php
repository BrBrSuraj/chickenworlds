<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Shop;
use App\Models\Order;
use App\Models\Stock;
use App\Rules\overVaueRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\stocks\stockManage;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('is_Manager');
        $stocks = Stock::latest()->paginate();
        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('is_Manager');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('is_Manager');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        $this->authorize('is_Manager');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {

        $this->authorize('is_Manager');
        return view('stocks.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock,)
    {
        $this->authorize('is_Manager');
        // info('stock_available_weight=' . $stock->weight);
        // info('stock_available_quantity=' . $stock->qty);
        $avgWeight = (($stock->weight) / ($stock->qty));
        // info('averageWeight of current stock=' . $avgWeight);
        $quantity =  $request->validate([
            'qty' => ['required', new overVaueRule]
        ]);

        $validated_quantity = $quantity['qty'];
        // info('validated_quantity='. $validated_quantity);
        $totalWeight = $validated_quantity * $avgWeight;
        // info('totalWeight after multiplying validated_quantity & $avgWeight=' . $totalWeight);
        $shop = Shop::where('stock_id', $stock->id)->first();
        // info('shop details'.$shop);
        DB::table('stocks')->where('id', $stock->id)->decrement('weight', $totalWeight);
        DB::table('stocks')->where('id', $stock->id)->decrement('qty', $request->input('qty'));
        if ($shop) {
            DB::table('shops')->where('id', $shop->id)->increment('weight', $totalWeight);
            // info('weight after increment='.Shop::where('id',$shop->id)->select('weight')->first()->weight);
        } else {
            Shop::create([
                'name' => $stock->product_name,
                'stock_id' => $stock->id,
                'weight' => $totalWeight,
            ]);
        }
        return to_route('stocks.index')->with('message', 'Extracted Succussfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $this->authorize('is_Manager');
    }
}
