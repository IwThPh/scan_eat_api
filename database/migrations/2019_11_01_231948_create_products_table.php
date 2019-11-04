<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('barcode');
            $table->string('name');
            $table->float('weight_g', 6, 2);
            $table->float('energy_100g', 6, 2);
            $table->float('carbohydrate_100g', 6, 2);
            $table->float('protein_100g', 6, 2);
            $table->float('fat_100g', 6, 2);
            $table->float('fiber_100g', 6, 2);
            $table->float('salt_100g', 6, 2);
            $table->float('sugar_100g', 6, 2);
            $table->float('saturated_100g', 6, 2);
            $table->float('sodium_100g', 6, 2);
            $table->timestamps();

            $table->unique('barcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
