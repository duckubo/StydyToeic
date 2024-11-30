<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grammarguideline extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'grammarguidelines';
    protected $primaryKey = 'grammarguidelineid';

    protected $fillable = [
        'grammarname',
        'grammarimage',
        'content',
    ];
}