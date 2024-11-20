<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationQuestion extends Model
{
    use HasFactory;
    protected $primaryKey = 'examinationquestionid'; // Khóa chính

    protected $fillable = [
        'num',
        'imagequestion',
        'audiogg',
        'audiomp3',
        'paragraph',
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'correctanswer',
        'examinationid',
    ];

    // Liên kết với bảng Examination
    public function examination()
    {
        return $this->belongsTo(Examination::class, 'examinationid', 'examinationid');
    }
}
