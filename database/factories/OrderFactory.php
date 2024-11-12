<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Creates an associated user
            'product_id' => Product::factory(), // Creates an associated product
            'quantity' => $this->faker->numberBetween(1, 5), // Random quantity for the order
            'status' => $this->faker->randomElement(['pending', 'processing', 'completed', 'canceled']),
        ];
    }
}
