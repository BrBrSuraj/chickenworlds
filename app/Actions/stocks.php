<?php
namespace App\Action;

use App\Models\Stock;

class Action {
    public function storeReceiveOrder($orders){
        foreach ($orders as $order) {
            Stock::firstOrCreate(
                ['order_id' => $order->id],
                [
                    'Product_name' => $order->product->name,
                    'rate' => $order->rate,
                    'weight' => $order->weight,
                    'qty' => $order->qty,
                    'totalAmount' => ($order->weight) * ($order->rate),
                ]

            );
        }
    }

}

