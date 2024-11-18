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
        Schema::create('vocabularyguidelines', function (Blueprint $table) {
            $table->id('vocabularyguidelineid');
            $table->string('vocabularyname', 45)->nullable(); // varchar(45), cho phép null
            $table->string('vocabularyimage', 45)->nullable(); // varchar(45), cho phép null
            $table->integer('checknoidung')->nullable(); // int, cho phép null
            $table->timestamps(); // Thêm các cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vocabularyguidelines');
    }
};
