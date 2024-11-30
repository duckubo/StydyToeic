<?php

namespace App\Http\Controllers;

use App\Imports\ExaminationQuestionImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

// Bạn sẽ tạo import ở bước sau

class ExcelController extends Controller
{
    public function showUploadForm()
    {
        return view('excel.upload'); // Trả về view chứa form upload
    }

    public function importExcel(Request $request)
    {
        // Kiểm tra xem file có tồn tại không
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        // Lấy file từ form
        $file = $request->file('excel_file');
        $vocabularyguidelineid = $request->vocabularyguidelineid;

        // Sử dụng gói Excel để đọc dữ liệu
        try {
            // Import dữ liệu từ file
            Excel::import(new ExaminationQuestionImport($vocabularyguidelineid), $file);

            return redirect()->back()->with('success', 'Dữ liệu đã được import thành công!');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors('Có lỗi xảy ra: ' . $e->getMessage());

        }
    }
}
