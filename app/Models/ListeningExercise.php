<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListeningExercise extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'listening_exercises';
    protected $primaryKey = 'listenexerciseid';

    protected $fillable = [
        'listenexercisename',
        'listenexerciseimage',
        'checkcauhoi',
    ];
}