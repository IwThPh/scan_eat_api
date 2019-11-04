<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergen_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('allergen_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->unique(['allergen_id', 'product_id']);

            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');

            $table->foreign('allergen_id')
                  ->references('id')->on('allergen')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergen_product');
    }
}
