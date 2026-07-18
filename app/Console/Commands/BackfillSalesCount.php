<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BackfillSalesCount extends Command
{
    protected $signature = 'products:backfill-sales-count';
    protected $description = 'Backfill sales_count on products from delivered order_items';

    public function handle(): int
    {
        $this->info('Backfilling sales_count from delivered orders...');

        $counts = DB::table('order_items')
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->where('orders.status', 'delivered')
            ->select('order_items.product_id', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->groupBy('order_items.product_id')
            ->get();

        $updated = 0;
        foreach ($counts as $row) {
            Product::withTrashed()
                ->where('id', $row->product_id)
                ->update(['sales_count' => $row->total_sold]);
            $updated++;
        }

        $this->info("Updated {$updated} products.");
        return self::SUCCESS;
    }
}
