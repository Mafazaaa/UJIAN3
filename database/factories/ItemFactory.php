<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        $customer = User::where('role', 'customer')->first();
        
        return [
            'customer_id' => $customer->id,
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['building', 'animal']),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected', 'completed']),
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'notes' => $this->faker->optional()->paragraph()
        ];
    }
} 