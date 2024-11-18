<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listening_exercises', function (Blueprint $table) {
            $table->id('listenexerciseid');
            $table->string('listenexercisename', 45)->nullable();
            $table->string('listenexerciseimage', 45)->nullable();
            $table->integer('checkcauhoi')->nullable();

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
        Schema::dropIfExists('listening_exercises');
    }
};
