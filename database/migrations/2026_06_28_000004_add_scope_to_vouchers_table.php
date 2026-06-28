<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {
            // 'site_wide' = applies to all products
            // 'products'  = applies only to explicitly linked products
            // 'categories' = applies to all products within linked categories
            $table->enum('scope', ['site_wide', 'products', 'categories'])->default('site_wide')->after('code');
        });
    }

    public function down(): void
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropColumn('scope');
        });
    }
};
