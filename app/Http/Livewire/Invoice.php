<?php

namespace App\Http\Livewire;

use App\Models\Good;
use Livewire\Component;

class Invoice extends Component
{
    public $sellGoods = [];
    public $allProducts = [];
    public $rate;
    public $sn = 1;
    public $productId;
    public $product_name;

    public function mount($id,$name)
    {
        $this->sellGoods = [
            ['good_id' => '1', 'quantity' => 1]
        ];
        $this->productId = $id;
        $this->product_name=$name;
        $this->allGoods = Good::where('product_id', $id)->get();
    }



    public function addSell()
    {
        $this->sellGoods[] = ['good_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->sellGoods[$index]);
        $this->sellGoods = array_values($this->sellGoods);
    }


    public function render()
    {

        return view('livewire.invoice');
    }
}
