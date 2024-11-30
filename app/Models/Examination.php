<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Examination extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'examinations';
    // Khóa chính của bảng
    protected $primaryKey = 'examinationid';

    // Các cột có thể fill dữ liệu
    protected $fillable = [
        'examinationame',
        'examinatioimage',
        'checkedcauhoi',
    ];
}