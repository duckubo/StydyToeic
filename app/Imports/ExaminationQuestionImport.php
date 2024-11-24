<?php
namespace App\Imports;

use App\Models\ExaminationQuestion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

// Thay thế với model bạn muốn lưu dữ liệu

class ExaminationQuestionImport implements ToModel, WithHeadingRow
{

    private $examinationId;

    // Constructor nhận examination_id để lưu vào câu hỏi
    public function __construct($examinationId)
    {
        $this->examinationId = $examinationId;
    }

    // Đọc mỗi dòng trong file Excel và tạo model ExaminationQuestion
    public function model(array $row)
    {
        return new ExaminationQuestion([
            'num' => $row['num'],
            'image_question' => $row['image_question'] ?? null,
            'audio_gg' => $row['audio_gg'] ?? null,
            'audio_mp3' => $row['audio_mp3'] ?? null,
            'paragraph' => $row['paragraph'] ?? null,
            'question' => $row['question'],
            'option1' => $row['option1'],
            'option2' => $row['option2'],
            'option3' => $row['option3'],
            'option4' => $row['option4'],
            'correctanswer' => $row['correct_answer'],
            'examinationid' => $this->examinationId,
        ]);
    }
}
