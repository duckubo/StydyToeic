<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'results';

    // Các cột có thể gán giá trị
    protected $fillable = [
        'correctanswernum',
        'incorrectanswernum',
        'time',
        'examinationid',
        'memberid',
        'correctanswerread',
        'correctanswerlisten',
    ];

    // Thiết lập mối quan hệ với model Examination
    public function examination()
    {
        return $this->belongsTo(Examination::class, 'examinationid');
    }

    // Thiết lập mối quan hệ với model User (hoặc Member)
    public function member()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
