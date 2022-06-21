<?php

namespace Database\Seeders;

use App\Models\Vaichele;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaicheleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vaichele::create([
            'type'=>'bolero',
            'number'=>"na 3 pa 7655"
        ]);
    }
}
