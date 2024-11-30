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
        Schema::create('vocabularycontents', function (Blueprint $table) {
            $table->id('vocabularycontentid'); // Primary key
            $table->integer('num')->nullable();
            $table->string('vocabularycontentname', 45)->nullable();
            $table->string('transcribe', 45)->nullable();
            $table->string('image', 45)->nullable();
            $table->string('audiomp3', 45)->nullable();
            $table->string('audiogg', 45)->nullable();
            $table->text('mean')->nullable();
            $table->unsignedBigInteger('vocabularyguidelineid')->nullable();

            // Foreign key constraint
            $table->foreign('vocabularyguidelineid')
                ->references('vocabularyguidelineid')
                ->on('vocabularyguidelines')
                ->onDelete('cascade'); // Optional: Handle deletion behavior

            $table->timestamps(); // Add created_at and updated_at columns

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vocabularycontents');
    }
};
