<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the old single-voucher FK and discount column
            // (replaced by the order_vouchers pivot table)
            $table->dropForeign(['voucher_id']);
            $table->dropColumn(['voucher_id', 'applied_voucher_discount']);
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('voucher_id')->nullable()->constrained('vouchers')->onDelete('set null');
            $table->decimal('applied_voucher_discount', 10, 2)->default(0);
        });
    }
};
