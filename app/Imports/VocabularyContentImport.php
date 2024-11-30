<?php

namespace App\Imports;

use App\Models\Vocabularycontent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VocabularyContentImport implements ToModel, WithHeadingRow
{
    private $vocabularyGuidelineId;

    // Constructor để nhận guideline_id
    public function __construct($vocabularyGuidelineId)
    {
        $this->vocabularyGuidelineId = $vocabularyGuidelineId;
    }

    // Đọc dữ liệu từ từng dòng và lưu vào model
    public function model(array $row)
    {
        return new Vocabularycontent([
            'num' => $row['num'], // Cột `num` từ Excel
            'vocabularycontentname' => $row['vocabulary_content_name'], // Tên cột trong Excel
            'transcribe' => $row['transcribe'] ?? null,
            'image' => $row['image'] ?? null,
            'audiomp3' => $row['audio_mp3'] ?? null,
            'audiogg' => $row['audio_gg'] ?? null,
            'mean' => $row['mean'] ?? null,
            'vocabularyguidelineid' => $this->vocabularyGuidelineId,
        ]);
    }
}
