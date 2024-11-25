<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_exercises', function (Blueprint $table) {
            $table->id('readexerciseid');
            $table->string('readname', 45)->nullable();
            $table->string('readimage', 45)->nullable();
            $table->integer('checkcauhoi')->nullable();
            $table->timestamps(); // Tạo cột created_at và updated_at

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reading_exercises');
    }
};