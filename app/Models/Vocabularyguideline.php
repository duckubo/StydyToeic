<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabularyguideline extends Model
{
    use HasFactory;
    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'vocabularyguidelines';

    // Các cột có thể được thêm hoặc sửa
    protected $fillable = ['name', 'description', 'image'];
}
