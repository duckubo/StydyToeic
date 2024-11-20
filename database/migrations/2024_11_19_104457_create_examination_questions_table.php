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
        Schema::create('examination_questions', function (Blueprint $table) {
            $table->id('examinationquestionid'); // AUTO_INCREMENT
            $table->integer('num')->nullable();
            $table->string('imagequestion', 45)->nullable();
            $table->string('audiogg', 45)->nullable();
            $table->string('audiomp3', 45)->nullable();
            $table->text('paragraph')->nullable();
            $table->text('question')->nullable();
            $table->text('option1')->nullable();
            $table->text('option2')->nullable();
            $table->text('option3')->nullable();
            $table->text('option4')->nullable();
            $table->string('correctanswer', 45)->nullable();
            $table->unsignedBigInteger('examinationid')->nullable();

            // Khóa ngoại
            $table->foreign('examinationid')->references('examinationid')->on('examinations')
                ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('examination_questions');
    }
};
