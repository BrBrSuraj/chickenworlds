<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Subash Kattel',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@321'),
        ]);
        if ($user) {
            $user->roles()->attach([1, 2, 3,4,5]);
        } else {
            $user->delete();
        }

        $user = User::create([
            'name' => 'Saroj Dulal',
            'email' => 'dulalsaroj@gmail.com',
            'password' => bcrypt('manager@321'),
        ]);
        if ($user) {
            $user->roles()->attach([2, 3,4,5]);
        } else {
            $user->delete();
        }

        $user = User::create([
            'name' => 'shopkeeper',
            'email' => 'shop@shop.com',
            'password' => bcrypt('shop@321'),
        ]);
        if ($user) {
            $user->roles()->attach([3]);
        } else {
            $user->delete();
        }

        $user = User::create([
            'name' => 'driver',
            'email' => 'driver@driver.com',
            'password' => bcrypt('driver@321'),
        ]);
        if ($user) {
            $user->roles()->attach([4]);
        } else {
            $user->delete();
        }

        $user = User::create([
            'name' => 'helper',
            'email' => 'helper@helper.com',
            'password' => bcrypt('helper@321'),
        ]);
        if ($user) {
            $user->roles()->attach([5]);
        } else {
            $user->delete();
        }
    }
}
