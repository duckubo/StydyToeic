<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeningExercise extends Model
{
    use HasFactory;
    protected $table = 'listening_exercises';
    protected $fillable = [
        'listenexercisename',
        'listenexerciseimage',
        'checkcauhoi',
    ];
}
