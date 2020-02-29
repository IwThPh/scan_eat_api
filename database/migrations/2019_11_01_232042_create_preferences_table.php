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
            $table->float('fibre_max', 6, 2)->nullable();
            $table->float('salt_max', 6, 2)->nullable();
            $table->float('sugar_max', 6, 2)->nullable();
            $table->float('saturated_max', 6, 2)->nullable();
            $table->float('sodium_max', 6, 2)->nullable();
            $table->double('carbohydrate_1', 2, 2)->default('0.5');
            $table->double('carbohydrate_2', 2, 2)->default('0.7');
            $table->double('protein_1', 2, 2)->default('0.5');
            $table->double('protein_2', 2, 2)->default('0.7');
            $table->double('fat_1', 2, 2)->default('0.5');
            $table->double('fat_2', 2, 2)->default('0.7');
            $table->double('fibre_1', 2, 2)->default('0.5');
            $table->double('fibre_2', 2, 2)->default('0.7');
            $table->double('salt_1', 2, 2)->default('0.5');
            $table->double('salt_2', 2, 2)->default('0.7');
            $table->double('sugar_1', 2, 2)->default('0.5');
            $table->double('sugar_2', 2, 2)->default('0.7');
            $table->double('saturated_1', 2, 2)->default('0.5');
            $table->double('saturated_2', 2, 2)->default('0.7');
            $table->double('sodium_1', 2, 2)->default('0.5');
            $table->double('sodium_2', 2, 2)->default('0.7');
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
