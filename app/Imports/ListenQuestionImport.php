<?php

namespace App\Imports;

use App\Models\ListeningQuestion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ListenQuestionImport implements ToModel, WithHeadingRow
{
    private $listenExerciseId;

    public function __construct($listenExerciseId)
    {
        $this->listenExerciseId = $listenExerciseId;
    }

    public function model(array $row)
    {
        return new ListeningQuestion([
            'num' => $row['num'], // Cột 0: Số thứ tự
            'imagename' => $row['imagename'], // Cột 1: Tên hình ảnh
            'audiomp3' => $row['audiomp3'], // Cột 2: File MP3
            'audiogg' => $row['audiogg'], // Cột 3: File GG
            'question' => $row['question'], // Cột 4: Câu hỏi
            'option1' => $row['option1'], // Cột 5: Lựa chọn 1
            'option2' => $row['option2'], // Cột 6: Lựa chọn 2
            'option3' => $row['option3'], // Cột 7: Lựa chọn 3
            'option4' => $row['option4'], // Cột 8: Lựa chọn 4
            'correctanswer' => $row['correctanswer'], // Cột 9: Đáp án đúng
            'listenexerciseid' => $this->listenExerciseId,
        ]);
    }
}
