<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeningQuestion extends Model
{
    use HasFactory;
    protected $table = 'listening_questions';
    protected $fillable = [
        'num',
        'imagename',
        'audiomp3',
        'audiogg',
        'question',
        'option1',
        'option2',
        'option3',
        'option4',
        'correctanswer',
        'listenexerciseid',
    ];

    // Định nghĩa quan hệ với bảng listenexercise
    public function listeningExercise()
    {
        return $this->belongsTo(ListenExercise::class, 'listenexerciseid', 'listenexerciseid');
    }
}
