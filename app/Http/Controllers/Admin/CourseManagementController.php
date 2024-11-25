<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseManagementController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Lấy tham số page từ request, mặc định là 1
            $pageid = $request->query('pageid', 1);

            $count = 4;
            if ($pageid == 1) {
                $offset = 0;
            } else {
                $offset = ($pageid - 1) * $count;
            }

            // Phân trang dữ liệu, sử dụng Eloquent
            $coursesList = Course::offset($offset)->limit($count)->get();
            // Tổng số trang
            $totalRows = Course::count();

            $maxPageId = ceil($totalRows / $count);

            return view('admin.courses', compact('coursesList', 'maxPageId', 'pageid'));
        } catch (\Exception $e) {
            return view('admin.courses')->with('error', $e->getMessage());
        }
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Chỉ chấp nhận file ảnh
        ]);

        // Lấy người dùng hiện tại
        $course = new Course();

        // Cập nhật thông tin người dùng
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->price = $request->input('price');

        // Nếu có mật khẩu mới, cập nhật mật khẩu
        // Nếu có ảnh đại diện, lưu ảnh và cập nhật đường dẫn
        if ($request->hasFile('image')) {
            // Lấy file ảnh
            $image = $request->file('image');

            // Tạo tên ảnh mới
            $imageName = time() . '.' . $image->getClientOriginalName();

            // Lưu ảnh vào thư mục public/images
            $image->move(public_path('images'), $imageName);

            // Cập nhật tên ảnh trong cơ sở dữ liệu
            $course->image = $imageName;
        } else {
            $course->image = "default.png";
        }
        // Lưu thay đổi
        $course->save();

        // Redirect hoặc trả về thông báo thành công
        return redirect()->back()->with('success', 'Course updated successfully!');
    }

    public function edit(Request $request)
    {
        // Lấy giá trị tham số "id" từ request
        $courseId = $request->input('id');
        $course = Course::find($courseId);
        // Trả về view và truyền giá trị "grammarguidelineid" vào view
        return view('Admin.coursedetails')->with('course', $course);
    }
    public function update(Request $request)
    {
        $courseId = $request->input('id'); // Lấy ID của đề thi từ request

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Chỉ chấp nhận file ảnh
        ]);

        // Lấy người dùng hiện tại
        $course = Course::find($courseId);
        // Validate dữ liệu

        // Cập nhật thông tin người dùng
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->price = $request->input('price');

        // Nếu có mật khẩu mới, cập nhật mật khẩu
        // Nếu có ảnh đại diện, lưu ảnh và cập nhật đường dẫn
        if ($request->hasFile('image')) {
            // Lấy file ảnh
            $image = $request->file('image');

            // Tạo tên ảnh mới
            $imageName = time() . '.' . $image->getClientOriginalName();

            // Lưu ảnh vào thư mục public/images
            $image->move(public_path('images'), $imageName);

            // Cập nhật tên ảnh trong cơ sở dữ liệu
            $course->image = $imageName;
        }
        // Lưu thay đổi
        $course->save();

        // Redirect hoặc trả về thông báo thành công
        return redirect()->back()->with('success', 'Course updated successfully!');
    }

    public function delete($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}
