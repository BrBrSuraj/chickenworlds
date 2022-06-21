<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'transactionCode' => $this->faker->unique()->numberBetween($min = 10000, $max = 1000000),
            'selectedCategory'=>rand(1,2),
            'selectedProduct' => rand(1,2),
            'weight' => $this->faker->randomDigit(500,1000),
            'rate' => $this->faker->randomDigit(150,200),
            'vaichele' => $this->faker->name(),
            'staff' => $this->faker->name(),
            'status' => 0,
            'received_date' => null,

        ];
    }
}
