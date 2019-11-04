<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('diet_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->unique(['diet_id', 'product_id']);

            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');

            $table->foreign('diet_id')
                  ->references('id')->on('diet')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diet_product');
    }
}
