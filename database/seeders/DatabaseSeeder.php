<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\DailyReport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone' => '08123456789',
            'role' => 'admin'
        ]);

        // Employee
        User::create([
            'name' => 'Employee',
            'email' => 'employee@example.com',
            'password' => Hash::make('password'),
            'phone' => '08123456788',
            'role' => 'employee'
        ]);

        // Create multiple customers
        User::factory(5)->create(['role' => 'customer']);

        // Default customer for testing
        User::create([
            'name' => 'Customer',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'phone' => '08123456787',
            'role' => 'customer'
        ]);

        // Create Items for each customer
        User::where('role', 'customer')->get()->each(function ($customer) {
            Item::factory(2)->create([
                'customer_id' => $customer->id
            ])->each(function ($item) {
                // Create transaction for each item
                Transaction::factory()->create([
                    'item_id' => $item->id
                ]);
                
                // Create daily reports for each item
                DailyReport::factory(3)->create([
                    'item_id' => $item->id,
                    'employee_id' => User::where('role', 'employee')->first()->id
                ]);
            });
        });
    }
}
