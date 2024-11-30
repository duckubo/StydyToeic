<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vocabularyguideline extends Model
{
    use HasFactory, SoftDeletes;
    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'vocabularyguidelines';
    protected $primaryKey = 'vocabularyguidelineid';

    // Các cột có thể được thêm hoặc sửa
    protected $fillable = ['name', 'description', 'image'];
}