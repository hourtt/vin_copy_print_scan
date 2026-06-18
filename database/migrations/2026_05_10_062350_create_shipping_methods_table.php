<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Shipping methods define the delivery options and fees customers can choose at checkout.
     */
    public function up(): void
    {
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');                         // e.g. "Standard Delivery"
            $table->text('description')->nullable();        // e.g. "Delivered within 3–5 business days"
            $table->decimal('fee', 10, 2)->default(0);     // delivery fee in dollars
            $table->unsignedTinyInteger('estimated_days');  // estimated delivery days
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
