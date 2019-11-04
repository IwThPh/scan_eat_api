<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('diet_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->unique(['diet_id', 'user_id']);

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('diet_id')
                  ->references('id')->on('diet')
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
        Schema::dropIfExists('diet_user');
    }
}
