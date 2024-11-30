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
        Schema::create('examinations', function (Blueprint $table) {
            $table->id('examinationid'); // Tạo cột khóa chính
            $table->string('examinationame', 45)->nullable(); // Tên kỳ thi
            $table->string('examinatioimage', 45)->nullable(); // Ảnh kỳ thi
            $table->integer('checkedcauhoi')->nullable(); // Số câu hỏi đã kiểm tra
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
        Schema::dropIfExists('examinations');
    }
};
