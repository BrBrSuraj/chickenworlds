<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::create(
            [

                    'category_id' => 1,
                    'name' => 'CHICKEN',
                    'price' => 150,
            ]);
        Product::create(
            [

                'category_id' => 2,
                'name' => 'Goat',
                'price' => 600,
            ]
        );
              //  [
                //     'category_id' => 1,
                //     'name' => 'Duck',
                //     'price' => 200,
                // ],
                // [
                //     'category_id' => 2,
                //     'name' => 'Common carp',
                //     'price' => 1000,
                // ],
                // [
                //     'category_id' => 2,
                //     'name' => 'Silver carp',
                //     'price' => 450,
                // ],
                // [
                //     'category_id' => 2,
                //     'name' => 'Peruvian anchoveta',
                //     'price' => 250,
                // ],
                // [
                //     'category_id' => 3,
                //     'name' => 'Goat',
                //     'price' => 1000,
                // ],
                // [
                //     'category_id' => 3,
                //     'name' => 'Pork',
                //     'price' => 450,
                // ],
                // [
                //     'category_id' => 3,
                //     'name' => 'Buff',
                //     'price' => 250,
                // ],

        //     ]
        // );
    //    Product::factory(10)->create();
        // Product::create([

        //         'category_id' => 1,
        //         'name' => 'CHICKEN',
        //         'price' => 150,

        //     // [
        //     //     'category_id' => 2,
        //     //     'name' => 'Muton',
        //     //     'price' => 1000,
        //     // ],
        //     // [
        //     //     'category_id' => 3,
        //     //     'name' => 'Pork',
        //     //     'price' => 200,
        //     // ],
        // ]);
    }
}
