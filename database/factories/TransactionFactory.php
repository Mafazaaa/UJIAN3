<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item_id' => Item::factory(),
            'amount' => $this->faker->numberBetween(100000, 1000000),
            'status' => $this->faker->randomElement(['pending', 'paid']),
        ];
    }
} 