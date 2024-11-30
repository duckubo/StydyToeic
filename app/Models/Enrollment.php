<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'phone',
        'is_success',
        'enroll_code',
        'price',
        'payment_content'
    ];

    public function getEnrollmentByUserCourse($userId, $courseId)
    {
        $enrollment = Enrollment::where('user_id', $userId)
                                ->where('course_id', $courseId)
                                ->first();  // Use first() to get a single record, or use get() for multiple records

        return $enrollment;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
