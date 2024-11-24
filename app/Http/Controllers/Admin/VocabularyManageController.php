<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\VocabularyContentImport;
use App\Models\Vocabularyguideline;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VocabularyManageController extends Controller
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
            $danhsachtuvung = Vocabularyguideline::offset($offset)->limit($count)->get();
            // Tổng số trang
            $totalRows = Vocabularyguideline::count();

            $maxPageId = ceil($totalRows / $count);

            return view('admin.vocabulary', compact('danhsachtuvung', 'maxPageId', 'pageid'));
        } catch (\Exception $e) {
            return view('admin.vocabulary')->with('msgdstuvung', $e->getMessage());
        }
    }
    public function edit(Request $request)
    {
        $vocabularyguidelineid = $request->input('vocabularyguidelineid');

        // Trả về view và truyền giá trị "grammarguidelineid" vào view
        return view('admin.insertvocabcontent')->with('vocabularyguidelineid', $vocabularyguidelineid);
    }
    public function media()
    {
        return view('admin.media_vocabularyguideline');
    }

    public function media_insert(Request $request)
    {
        $files = $request->file('files'); // Mảng chứa các file
        if (!$files) {
            return redirect()->back()->with('error', 'Hãy thêm ảnh');
        }
        foreach ($files as $file) {
            // Xử lý từng file
            if ($file->isValid()) {

                $fileName = $file->getClientOriginalName();
                $filePath = public_path('images') . '/' . $fileName;

                if (file_exists($filePath)) {
                    continue; // Bỏ qua và tiếp tục với file tiếp theo
                }
                $file->move(public_path('images'), $fileName);
            }
        }
        return redirect()->back()->with('success', 'Lưu ảnh thành công!');

    }

    public function importExcel(Request $request)
    {
        // Kiểm tra xem file có tồn tại không
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        // Lấy file từ form
        $file = $request->file('excel_file');

        $vocabularyguidelineid = $request->input('vocabularyguidelineid');
        // Sử dụng gói Excel để đọc dữ liệu
        try {
            // Import dữ liệu từ file
            Excel::import(new VocabularyContentImport($vocabularyguidelineid), $file);

            return redirect()->back()->with('success', 'Dữ liệu đã được import thành công!');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors('Có lỗi xảy ra: ' . $e->getMessage());

        }

    }
}
