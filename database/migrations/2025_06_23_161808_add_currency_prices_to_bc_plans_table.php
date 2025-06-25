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
        Schema::table('bc_plans', function (Blueprint $table) {
            //
            $table->decimal('price_inr', 10, 2)->nullable();
            $table->decimal('price_usd', 10, 2)->nullable();
            $table->decimal('price_eur', 10, 2)->nullable();
            $table->decimal('annual_price_inr', 10, 2)->nullable();
            $table->decimal('annual_price_usd', 10, 2)->nullable();
            $table->decimal('annual_price_eur', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bc_plans', function (Blueprint $table) {
            //
        });
    }
};
