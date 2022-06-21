<?php

namespace Database\Seeders;

use App\Models\Good;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Supplier;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Bird'
        ]);
        Category::create([
            'name' => 'Domestic Goat'
        ]);
    }
}
        // $this->faker = Faker::create();
        // Category::factory(1)->create()->each(function ($category) {
        //     Product::factory(2)->create([
        //         'category_id' => $category->id,
        //     ])->each(function($product){
        //         Good::factory(3)->create([
        //             'product_id'=>$product->id,

        //         ]);
        //         Order::factory(10)->create([
        //             'selectedProduct' => $product->id,

        //         ])->each(function($order){
        //             Supplier::factory(1)->create([
        //                 'order_id'=>$order->id,
        //             ]);

        //             Payment::factory(1)->create([
        //                 'order_id' => $order->id,
        //             ]);
        //         });

        //     });




