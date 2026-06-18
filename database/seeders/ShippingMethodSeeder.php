<?php

namespace Database\Seeders;

use App\Models\ShippingMethod;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Seed available shipping/delivery options.
     */
    public function run(): void
    {
        $methods = [
            [
                'name'           => 'Store Pickup',
                'description'    => 'Pick up your order at our store in Sihanoukville. Free of charge.',
                'fee'            => 0.00,
                'estimated_days' => 0,
                'is_active'      => true,
            ],
            [
                'name'           => 'Standard Delivery',
                'description'    => 'Delivered to your address within 3–5 business days.',
                'fee'            => 3.00,
                'estimated_days' => 5,
                'is_active'      => true,
            ],
            [
                'name'           => 'Express Delivery',
                'description'    => 'Priority delivery to your address within 1–2 business days.',
                'fee'            => 7.00,
                'estimated_days' => 2,
                'is_active'      => true,
            ],
            [
                'name'           => 'Same-Day Delivery',
                'description'    => 'Order before 12PM for same-day delivery within Sihanoukville city.',
                'fee'            => 12.00,
                'estimated_days' => 1,
                'is_active'      => true,
            ],
        ];

        foreach ($methods as $method) {
            ShippingMethod::firstOrCreate(['name' => $method['name']], $method);
        }
    }
}
