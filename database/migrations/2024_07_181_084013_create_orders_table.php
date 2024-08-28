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
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Customer_id')->unsigned();
            $table->string('Name', 300)->nullable();
            $table->string('Email', 300)->nullable();
            $table->string('Address', 300)->nullable();
            $table->tinyInteger('Status')->default(0);
            $table -> string('token',50) -> nullable();
            $table->timestamps();

            $table->foreign('Customer_id')->references('id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
