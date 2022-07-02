<?php

namespace Database\Factories;

use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'code' => $this->faker->ean8(),
            'stock' => $this->faker->randomNumber(1, true),
            'warehouse_id' => Warehouse::factory()
        ];
    }
}
