<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ListenQuestionImport;
use App\Models\ListeningExercise;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ListeningManageController extends Controller
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
            $listlisteningexercise = ListeningExercise::offset($offset)->limit($count)->get();
            // Tổng số trang
            $totalRows = ListeningExercise::count();

            $maxPageId = ceil($totalRows / $count);

            return view('admin.listening', compact('listlisteningexercise', 'maxPageId', 'pageid'));
        } catch (\Exception $e) {
            return view('admin.listening')->with('error', $e->getMessage());
        }
    }
    public function edit(Request $request)
    {
        $listenexerciseid = $request->input('listenexerciseid');

        // Trả về view và truyền giá trị "grammarguidelineid" vào view
        return view('admin.insertlistencontent')->with('listenexerciseid', $listenexerciseid);
    }
    public function media()
    {
        return view('admin.media_listeningexercise');
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
    public function importExcel(Request $request)
    {
        // Kiểm tra xem file có tồn tại không
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        // Lấy file từ form
        $file = $request->file('excel_file');

        $listenexerciseid = $request->input('listenexerciseid');
        // Sử dụng gói Excel để đọc dữ liệu
        try {
            // Import dữ liệu từ file
            Excel::import(new ListenQuestionImport($listenexerciseid), $file);

            return redirect()->back()->with('success', 'Dữ liệu đã được import thành công!');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors('Có lỗi xảy ra: ' . $e->getMessage());

        }
    }

    public function delete($listenexerciseid)
    {
        $listenexercise = ListeningExercise::find($listenexerciseid);

        $listenexercise->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}