<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * Dependency order (must be respected):
     *  1. AdminSeeder            — creates the admin user
     *  2. CategorySeeder         — creates product categories
     *  3. BrandSeeder            — creates printer brands (HP, Canon, Brother, etc.)
     *  4. PrinterModelSeeder     — creates printer models (references brands)
     *  5. ProductSeeder          — creates products (references categories & brands)
     *  6. ShippingMethodSeeder   — creates delivery options
     *  7. VoucherSeeder          — creates vouchers and links to products
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            PrinterModelSeeder::class,
            ProductSeeder::class,
            ShippingMethodSeeder::class,
            VoucherSeeder::class,
        ]);
    }
}
