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
        Schema::create('listening_questions', function (Blueprint $table) {
            $table->id('listenquestionid'); // Khóa chính, tự động tăng
            $table->integer('num')->nullable(); // Số thứ tự
            $table->string('imagename', 45)->nullable(); // Tên hình ảnh
            $table->string('audiomp3', 45)->nullable(); // Tên file audio MP3
            $table->string('audiogg', 45)->nullable(); // Tên file audio OGG
            $table->text('question')->nullable(); // Nội dung câu hỏi
            $table->string('option1', 5)->nullable(); // Lựa chọn 1
            $table->string('option2', 5)->nullable(); // Lựa chọn 2
            $table->string('option3', 5)->nullable(); // Lựa chọn 3
            $table->string('option4', 5)->nullable(); // Lựa chọn 4
            $table->string('correctanswer', 5)->nullable(); // Đáp án đúng
            $table->unsignedBigInteger('listenexerciseid')->nullable(); // Khóa ngoại đến bảng listenexercise
            $table->timestamps();

            $table->foreign('listenexerciseid')
                ->references('listenexerciseid')
                ->on('listening_exercises')
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
        Schema::dropIfExists('listening_questions');
    }
};
