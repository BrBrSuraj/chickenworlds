<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id'=>null,
            'selectedSupplier'=>'farmer',
            'supplierName'=>$this->faker->name(),
            'supplierAddress'=>$this->faker->address(),
            'supplierMobileNumber'=>$this->faker->phoneNumber(),
        ];
    }
}
