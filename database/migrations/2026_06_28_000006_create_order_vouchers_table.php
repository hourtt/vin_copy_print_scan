<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Step 1: Create the order_vouchers pivot table
        Schema::create('order_vouchers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('voucher_id')->constrained('vouchers')->onDelete('cascade');
            $table->decimal('discount_amount', 10, 2)->default(0);
            // Snapshot of which product IDs this voucher discount was applied to
            $table->json('applied_to_product_ids')->nullable();
            $table->timestamps();
            $table->unique(['order_id', 'voucher_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_vouchers');
    }
};
