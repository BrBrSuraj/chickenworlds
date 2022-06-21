<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('supplier', 'payment', 'product')->latest()->paginate(10);
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        $product = Product::where('id', $order->selectedProduct)->first();
        $delay = now()->diffForHumans($order->created_at);
        $orderTime = $order->created_at->diffForHumans($order->received_date);
        return view('orders.show', compact('order', 'product', 'delay', 'orderTime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.receive', \compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        // update order after receive the product
        $order->update($request->validated() + ['status' => 1, 'received_date' => now()]);
       $data=$order->fresh();
      $stock= Stock::where('product_id',$data->selectedProduct)->select('product_id','weight','qty')->first();

      if($stock){
            DB::table('stocks')->where('product_id', $data->selectedProduct)->increment('weight',$data->weight);
            DB::table('stocks')->where('product_id', $data->selectedProduct)->increment('qty', $data->qty);

      }else{
         $productName= Product::where('id', $data->selectedProduct)->select('name')->first();
          Stock::create([
              'product_id'=>$data->selectedProduct,
              'product_name' => $productName->name,
              'weight' => $data->weight,
              'qty'=>$data->qty,
          ]);
      }
      return redirect()->route('orders.index')->with('message', 'Order Received Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
         $order->delete();
         return to_route('orders.index')->with('message','Order deleted successfully.');
    }

    public function change($id)
    {
        // to edit order details
    }
}
