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
        Schema::create('sales_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SalesID');
            $table->unsignedBigInteger('ProductID');
            $table->foreign('SalesID')->references('SalesID')->on('sales')->cascadeOnDelete();
            $table->foreign('ProductID')->references('ProductID')->on('products')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        {
            Schema::dropIfExists('sales_products');
        }
    }
};
