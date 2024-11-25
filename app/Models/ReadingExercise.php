<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReadingExercise extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'reading_exercises';
    protected $primaryKey = 'readexerciseid';

    protected $fillable = [
        'readname',
        'readimage',
        'checkcauhoi',
    ];
}