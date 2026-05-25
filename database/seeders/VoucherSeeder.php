<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $products = Product::factory(10)->create();

        Voucher::factory(5)->create()->each(function($voucher) use ($products) {
            //* attach random products
            $voucher->products()->attach($products->random(rand(1, 5))->pluck('id')->toArray());
        });
    }
}
