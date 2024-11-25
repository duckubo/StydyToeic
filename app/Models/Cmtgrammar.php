<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmtgrammar extends Model
{
    use HasFactory;
    protected $table = 'cmtgrammar';

    // Định nghĩa các thuộc tính có thể gán (mass assignable)
    protected $fillable = [
        'cmtgrammarcontent',
        'memberid',
        'grammarguidelineid',
    ];

    // Định nghĩa quan hệ với bảng users
    public function user()
    {
        return $this->belongsTo(User::class, 'memberid', 'id');
    }

    // Định nghĩa quan hệ với bảng grammarguideline
    public function grammarguideline()
    {
        return $this->belongsTo(Grammarguideline::class, 'grammarguidelineid', 'grammarguidelineid');
    }
}
