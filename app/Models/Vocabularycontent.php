<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabularycontent extends Model
{
    use HasFactory;
    protected $table = 'vocabularycontents';
    protected $fillable = [
        'vocabularycontentname',
        'transcribe',
        'image',
        'audiomp3',
        'audiogg',
        'mean',
        'vocabularyguidelineid',
    ];
    public function vocabularyguidelines()
    {
        return $this->belongsTo(Vocabularyguideline::class, 'vocabularyguidelineid');
    }
}
