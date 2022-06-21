<?php

namespace Database\Seeders;

use App\Models\Good;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //  Good::factory(10)->create();
        DB::table('goods')->insert([
            ['product_id' => 1, 'name' => 'Alive Chicken', 'sp' => '190'],
            ['product_id' => 1, 'name' => 'readymate Chicken', 'sp' => '480'],
            ['product_id' => 1, 'name' => 'Leg Pic Chicken', 'sp' => '550'],
            ['product_id' => 1, 'name' => 'Tauko Khutta ', 'sp' => '150'],
            ['product_id' => 1, 'name' => 'Ghatta kalego Chicken', '200' => '500'],
            ['product_id' => 1, 'name' => 'mix Chicken', 'sp' => '250'],

        ]);
        DB::table('goods')->insert([
            ['product_id' => 2, 'name' => 'Alive goat', 'sp' => '190'],
            ['product_id' => 2, 'name' => 'readymate goat', 'sp' => '480'],
            ['product_id' => 2, 'name' => 'Leg Pic goat', 'sp' => '550'],
            ['product_id' => 2, 'name' => 'Tauko goat ', 'sp' => '150'],
            ['product_id' => 2, 'name' => 'Ghatta kalego goat', '200' => '500'],
            ['product_id' => 2, 'name' => 'mix goat', 'sp' => '250'],

        ]);
        // Good::create([
        //     'product_id' => 1, 'name' => 'readymate Chicken', 'sp' => '500',
        //     // ['product_id' => 1, 'name' => 'ReadyMade FullBody', 'price' => '250'],
        //     // ['product_id' => 1, 'name' => 'ReadyMate', 'price' => '400'],
        //     // ['product_id' => 1, 'name' => 'tauko/khutta', 'price' => '100'],
        //     // ['product_id' => 1, 'name' => 'Ghatta/Kalego', 'price' => '180'],
        //     // ['product_id' => 1, 'name' => 'Lost Special', 'price' => '550'],

        // ]);
    }
}
