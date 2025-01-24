<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DailyReportFactory extends Factory
{
    public function definition(): array
    {
        $employee = User::where('role', 'employee')->first();
        
        return [
            'item_id' => Item::factory(),
            'employee_id' => $employee->id,
            'report_date' => $this->faker->date(),
            'description' => $this->faker->paragraph()
        ];
    }
} 