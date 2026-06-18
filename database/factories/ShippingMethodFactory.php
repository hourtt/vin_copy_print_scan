<?php

namespace Database\Factories;

use App\Models\ShippingMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ShippingMethod>
 */
class ShippingMethodFactory extends Factory
{
    private static array $methods = [
        [
            'name'           => 'Standard Delivery',
            'description'    => 'Delivered within 3–5 business days.',
            'fee'            => 3.00,
            'estimated_days' => 5,
            'is_active'      => true,
        ],
        [
            'name'           => 'Express Delivery',
            'description'    => 'Delivered within 1–2 business days.',
            'fee'            => 7.00,
            'estimated_days' => 2,
            'is_active'      => true,
        ],
        [
            'name'           => 'Same-Day Delivery',
            'description'    => 'Order before 12PM for same-day delivery within the city.',
            'fee'            => 12.00,
            'estimated_days' => 1,
            'is_active'      => true,
        ],
        [
            'name'           => 'Store Pickup',
            'description'    => 'Pick up your order in-store for free.',
            'fee'            => 0.00,
            'estimated_days' => 0,
            'is_active'      => true,
        ],
    ];

    private static int $index = 0;

    public function definition(): array
    {
        $method = self::$methods[self::$index % count(self::$methods)];
        self::$index++;

        return $method;
    }
}
