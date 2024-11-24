<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(Request $request) {
        try {
            // Lấy pageid từ request và thiết lập các thông số phân trang
            $pageId = $request->query('pageid', 1); // Giá trị mặc định là 1 nếu không có pageid
            $count = 4;

            if ($pageId == 1) {
                $offset = 0;
            } else {
                $offset = ($pageId - 1) * $count;
            }

            // Truy vấn danh sách từ vựng
            $courses = Course::offset($offset)->limit($count)->get();
            // Đếm tổng số dòng trong bảng
            $totalRows = Course::count();

            // Tính tổng số trang
            $maxPageId = ceil($totalRows / $count);

            // Truyền dữ liệu qua view
            return view('courses', [
                'courses' => $courses,
                'maxPageId' => $maxPageId,
                'currentPage' => $pageId,
            ]);

        } catch (\Exception $e) {
            // Xử lý lỗi và hiển thị thông báo
            return view('courses')->with('errorMessage', $e->getMessage());
        }
    }

    public function show($courseid) {
        if (auth()->check()) {
            $userId = auth()->id();
        } else {
            return redirect('login'); 
        }
        $course = Course::findOrFail($courseid);
        $user = User::find($userId);
        $enroll = $user->enrollments()->where('course_id', $courseid)->first();
        if ($enroll) {
            $is_enroll = $enroll->is_success; 
        } else {
            $is_enroll = false;
        }
        $lessons = $course->lessons;
        return view('coursedetail', compact('course', 'lessons', 'is_enroll'));
    }

    public function enroll($courseid) {
        if (auth()->check()) {
            $userId = auth()->id();
        } else {
            return redirect('login'); 
        }
    }

    public function showLession($lessionid) {
        $lession = Lesson::find($lessionid);
        $nextLes = Lesson::where('id', '>', $lession->id)
                 ->orderBy('id', 'asc')
                 ->first();
        return view('lession',compact('lession','nextLes'));
    }
}
