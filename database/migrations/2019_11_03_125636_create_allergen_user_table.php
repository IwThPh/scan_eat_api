<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergen_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('allergen_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->unique(['allergen_id', 'user_id']);

            $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('allergen_user');
    }
}
