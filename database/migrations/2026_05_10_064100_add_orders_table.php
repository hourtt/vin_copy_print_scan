<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // * Work the same as $table->bigIncrements('id');
            //* Foreign key to user table
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('order_date');
            $table->timestamp('shipped_time')->nullable();
            $table->decimal('subtotal',10,2)->default(0);

            //* Foreign key to voucher table
            $table->foreignId('voucher_id')->nullable()->constrained('vouchers')->onDelete('set null');
            $table->decimal('applied_voucher_discount',10,2)->default(0);
            $table->decimal('total', 10, 2);
            $table->enum('status',['pending', 'processing', 'completed', 'cancelled']);

            // * created_by is created in case, that admin has a manual order from customer
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            // * updated_by is created in case, when admin changes status or shipped date manually
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

