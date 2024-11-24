<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grammarguideline;
use Illuminate\Http\Request;

class GrammarManageController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Lấy tham số page từ request, mặc định là 1
            $pageid = $request->query('pageid', 1);

            $count = 3;
            if ($pageid == 1) {
                $offset = 0;
            } else {
                $offset = ($pageid - 1) * $count;
            }

            // Phân trang dữ liệu, sử dụng Eloquent
            $listgrammarguidelinemanage = Grammarguideline::offset($offset)->limit($count)->get();

            // Tổng số trang
            $totalRows = Grammarguideline::count();

            $maxPageId = ceil($totalRows / $count);

            return view('admin.grammar', compact('listgrammarguidelinemanage', 'maxPageId', 'pageid'));
        } catch (\Exception $e) {
            return view('admin.grammar')->with('error', $e->getMessage());
        }
    }
    public function edit(Request $request)
    {
        // Lấy giá trị tham số "id" từ request
        $grammarguidelineid = $request->input('id');

        // Trả về view và truyền giá trị "grammarguidelineid" vào view
        return view('Admin.insertgrammarguidelinecontent')->with('grammarguidelineid', $grammarguidelineid);
    }

    public function update(Request $request)
    {
        // Lấy các tham số từ request
        $content = $request->input('content');
        $grammarguidelineid = $request->input('grammarguidelineid');

        $grammarguideline = Grammarguideline::where('grammarguidelineid', $grammarguidelineid)->first();

        if (!$grammarguideline) {
            // Nếu không tìm thấy đối tượng, trả về thông báo lỗi
            return redirect()->route('edit.grammarguidelinecontent')->with('msggrammarguidelinecontent', 'Không tìm thấy nội dung ngữ pháp');
        }
        // Cập nhật nội dung
        $grammarguideline->content = $content;
        // Sử dụng DB facade để thực hiện thao tác với cơ sở dữ liệu
        try {
            // Cập nhật nội dung vào cơ sở dữ liệu
            $isUpdated = $grammarguideline->save(); // Sử dụng save() để cập nhật dữ liệu
            if ($isUpdated) {
                // Nếu cập nhật thành công, chuyển hướng về trang list
                return redirect()->route('admin.grammar')->with('msggrammarguidelinecontent', 'Cập nhật nội dung thành công');
            } else {
                // Nếu thất bại, thiết lập thông báo lỗi và quay lại trang Edit
                return redirect()->route('edit.grammarguidelinecontent')->with('msggrammarguidelinecontent', 'Cập nhật nội dung không thành công')->with('grammarguidelineid', $grammarguidelineid);
            }
        } catch (\Exception $e) {
            // Nếu có lỗi trong quá trình thao tác, xử lý lỗi tại đây
            dd($e->getMessage()); // Hiển thị thông báo lỗi chi tiết

            return redirect()->route('edit.grammarguidelinecontent')->with('msggrammarguidelinecontent', 'Có lỗi xảy ra, vui lòng thử lại');
        }

    }
    public function store(Request $request)
    {
        $grammarname = $request->input('grammarname');

        // Tạo đối tượng Grammarguideline
        $grammarguideline = new Grammarguideline();
        $grammarguideline->grammarname = $grammarname;

        if ($request->hasFile('grammarimage')) {
            // Lấy file ảnh
            $image = $request->file('grammarimage');

            // Tạo tên ảnh mới
            $imageName = time() . '_' . $image->getClientOriginalName();
            // Lưu ảnh vào thư mục public/images
            $image->move(public_path('images'), $imageName);

            // Cập nhật tên ảnh trong cơ sở dữ liệu
            $grammarguideline->grammarimage = $imageName;
        }
        // Sử dụng DB facade để thực hiện thao tác với cơ sở dữ liệu
        try {
            // Gọi phương thức Insert trong GrammarguidelinemanageDAO (có thể sử dụng phương thức lưu trực tiếp của Eloquent)
            $grammarguideline->save();

            if ($grammarguideline->exists) {
                // Nếu thêm thành công, lấy ID của Grammarguideline vừa tạo
                $grammarguidelineid = $grammarguideline->id;

                // Trả về thông tin và chuyển hướng tới trang Insertgrammarguidelineimage
                return redirect()->route('admin.grammar')->with('msglistgrammarguidelinemanage', 'Thêm thành công');

            } else {
                // Nếu thêm thất bại, thiết lập thông báo lỗi và quay lại trang danh sách
                return redirect()->route('admin.grammar')->with('msglistgrammarguidelinemanage', 'Thêm không thành công');
            }
        } catch (\Exception $e) {
            // Xử lý lỗi khi có vấn đề với cơ sở dữ liệu
            return redirect()->route('admin.grammar')->with('msglistgrammarguidelinemanage', $e->getMessage());
        }
    }

}
