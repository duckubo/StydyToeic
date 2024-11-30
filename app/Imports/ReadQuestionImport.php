<?php

namespace App\Imports;

use App\Models\ReadingQuestion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReadQuestionImport implements ToModel, WithHeadingRow
{
    private $readExerciseId;

    // Constructor nhận readExerciseId để lưu vào câu hỏi
    public function __construct($readExerciseId)
    {
        $this->readExerciseId = $readExerciseId;
    }

    public function model(array $row)
    {
        return new ReadingQuestion([
            'num' => $row['num'],
            'paragraph' => $row['paragraph'],
            'question' => $row['question'],
            'option1' => $row['option1'],
            'option2' => $row['option2'],
            'option3' => $row['option3'],
            'option4' => $row['option4'],
            'correctanswer' => $row['correct_answer'],
            'readexeriseid' => $this->readExerciseId,
        ]);
    }
}
