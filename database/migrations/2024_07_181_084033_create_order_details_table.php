<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Order_id')->unsigned();
            $table->integer('Product_id')->unsigned();
            $table->float('quantity');
            $table->float('Price');
            $table->timestamps();

            $table->foreign('Product_id')->references('Product_id')->on('product');
            $table->foreign('Order_id')->references('id')->on('order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
    }
};
