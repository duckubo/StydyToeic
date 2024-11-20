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
        Schema::create('results', function (Blueprint $table) {
            $table->id('resultid'); // Tạo khóa chính với kiểu AUTO_INCREMENT
            $table->integer('correctanswernum')->nullable(); // Số câu trả lời đúng
            $table->integer('incorrectanswernum')->nullable(); // Số câu trả lời sai
            $table->string('time', 50)->nullable(); // Thời gian làm bài
            $table->unsignedBigInteger('examinationid')->nullable(); // ID bài thi
            $table->unsignedBigInteger('memberid')->nullable(); // ID người dùng (thành viên)
            $table->integer('correctanswerread')->nullable(); // Số câu trả lời đúng phần đọc
            $table->integer('correctanswerlisten')->nullable(); // Số câu trả lời đúng phần nghe
            $table->foreign('examinationid')->references('examinationid')->on('examinations')->onDelete('cascade'); // Khóa ngoại tham chiếu đến bảng examination
            $table->foreign('memberid')->references('id')->on('users')->onDelete('cascade'); // Khóa ngoại tham chiếu đến bảng users
            $table->index('memberid'); // Tạo chỉ mục cho memberid
            $table->index('examinationid'); // Tạo chỉ mục cho examinationid
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
        Schema::dropIfExists('results');
    }
};
