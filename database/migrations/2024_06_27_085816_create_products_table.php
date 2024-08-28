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
        Schema::create('product', function (Blueprint $table) {
            $table->increments('Product_id');
            $table->integer('Category_id')->unsigned();
            $table->string('Product_name', 300);
            $table->integer('Brand')->unsigned();
            $table->float('Price');
            $table->string('Images', 300);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('Category_id')->references('Category_id')->on('Category');
            $table->foreign('Brand')->references('Brand_id')->on('Brand');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('product_category_id_foreign');
        });
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('product_brand_foreign');
        });
        Schema::dropIfExists('product');
    }
};
