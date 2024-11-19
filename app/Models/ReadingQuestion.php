<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadingQuestion extends Model
{
    use HasFactory;
    protected $table = 'reading_questions';

    // Định nghĩa các thuộc tính có thể gán đại trà (mass assignment)
    protected $fillable = [
        'num',
        'paragraph',
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'correctanswer',
        'readexeriseid',
    ];

    // Khai báo mối quan hệ với bảng 'readexercise'
    public function readingexercise()
    {
        return $this->belongsTo(ReadingExercise::class, 'readexeriseid');
    }
}
