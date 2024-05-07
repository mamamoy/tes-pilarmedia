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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('SalesID');
            $table->string('SalesCode')->unique();
            $table->unsignedBigInteger('SalesPersonID');
            $table->foreign('SalesPersonID')->references('SalesPersonID')->on('sales_persons')->cascadeOnDelete();
            $table->float('SalesAmount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
