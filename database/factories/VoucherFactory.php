<?php

namespace Database\Factories;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'code' => strtoupper(fake()->bothify('??###')),
            'discount_type' => fake()->randomElement(['percentage', 'fixed']),
            'discount_value' => fake()->numberBetween(5, 50),
            'usage_limit' => fake()->numberBetween(1, 100),
            'used_count' => 0,
            'expires_at' => fake()->dateTimeBetween('now', '+1 year'),
            'is_active' => true,
        ];
    }
}
