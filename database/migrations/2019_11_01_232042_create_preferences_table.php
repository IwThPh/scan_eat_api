<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('preferences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->float('energy_max', 6, 2)->nullable();
            $table->float('carbohydrate_max', 6, 2)->nullable();
            $table->float('protein_max', 6, 2)->nullable();
            $table->float('fat_max', 6, 2)->nullable();
            $table->float('fiber_max', 6, 2)->nullable();
            $table->float('salt_max', 6, 2)->nullable();
            $table->float('sugar_max', 6, 2)->nullable();
            $table->float('saturated_max', 6, 2)->nullable();
            $table->float('sodium_max', 6, 2)->nullable();
            $table->timestamps();

            $table->unique('user_id');

            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('preferences');
    }
}
