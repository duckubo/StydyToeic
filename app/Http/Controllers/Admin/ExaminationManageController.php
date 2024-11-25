<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Examination;
use Illuminate\Http\Request;

class ExaminationManageController extends Controller
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
            $listexaminationexercise = Examination::offset($offset)->limit($count)->get();
            // Tổng số trang
            $totalRows = Examination::count();

            $maxPageId = ceil($totalRows / $count);

            return view('admin.examination', compact('listexaminationexercise', 'maxPageId', 'pageid'));
        } catch (\Exception $e) {
            return view('admin.examination')->with('msgquanlydethi', $e->getMessage());
        }
    }
    public function edit(Request $request)
    {
        // Lấy giá trị tham số "id" từ request
        $examinationid = $request->input('id');

        // Trả về view và truyền giá trị "grammarguidelineid" vào view
        return view('Admin.insertexaminationidcontent')->with('examinationid', $examinationid);
    }
    public function update(Request $request)
    {
        $examinationId = $request->input('examinationid'); // Lấy ID của đề thi từ request

        // Gọi hàm Uploadcauhoidethi (mô phỏng hàm xử lý upload câu hỏi)
        $test = $this->uploadQuestionToExam($request, $examinationId);

        if ($test === "Success") {
            // Gọi hàm kiểm tra câu hỏi trong đề thi
            $this->checkQuestions($examinationId);

            // Chuyển hướng đến trang quản lý đề thi với pageid=1
            return redirect()->route('exam.management', ['pageid' => 1]);
        } else {
            // Nếu lỗi, quay lại trang thêm câu hỏi và hiển thị thông báo lỗi
            return redirect()->route('exam.add.questions')->with([
                'msgthemcauhoidethi' => $test,
                'examinationid' => $examinationId,
            ]);
        }
    }

    public function media()
    {
        return view('admin.media_examination');
    }

    public function media_insert(Request $request)
    {
        $files = $request->file('files'); // Mảng chứa các file
        if (!$files) {
            return redirect()->back()->with('error', 'Hãy thêm ảnh hoặc âm thanh');
        }

        foreach ($files as $file) {
            // Xử lý từng file
            if ($file->isValid()) {
                $fileName = $file->getClientOriginalName();
                $fileExtension = $file->getClientOriginalExtension(); // Lấy phần mở rộng của file
                // Xác định thư mục lưu trữ dựa vào loại file
                if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
                    // Nếu file là ảnh, lưu vào thư mục images
                    $filePath = public_path('images') . '/' . $fileName;
                    // Kiểm tra nếu file đã tồn tại
                    if (file_exists($filePath)) {
                        continue; // Bỏ qua và tiếp tục với file tiếp theo
                    }
                    $file->move(public_path('images'), $fileName);
                } elseif (in_array($fileExtension, ['mp3', 'ogg', 'wav'])) {
                    // Nếu file là âm thanh, lưu vào thư mục audio
                    $filePath = public_path('audio') . '/' . $fileName;
                    // Kiểm tra nếu file đã tồn tại
                    if (file_exists($filePath)) {
                        continue; // Bỏ qua và tiếp tục với file tiếp theo
                    }
                    $file->move(public_path('audio'), $fileName);
                } else {

                    return redirect()->back()->with('error', 'File không hợp lệ!');
                }
            }
        }

        return redirect()->back()->with('success', 'Lưu ảnh và âm thanh thành công!');

    }

    public function delete($examinationid)
    {
        $examination = Examination::find($examinationid);

        $examination->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}