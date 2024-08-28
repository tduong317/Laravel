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
        Schema::create('image_detail', function (Blueprint $table) {
            $table->increments('Images_id');
            $table->integer('Product_id')->unsigned();
            $table->string('Images');
            $table->timestamps();

            $table->foreign('Product_id')->references('Product_id')->on('Product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('image_detail', function (Blueprint $table) {
            $table->dropForeign('image_detail_product_id_foreign');
        });
        Schema::dropIfExists('image_detail');
    }
};
