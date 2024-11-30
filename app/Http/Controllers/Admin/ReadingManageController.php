<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ReadQuestionImport;
use App\Models\ReadingExercise;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReadingManageController extends Controller
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
            $listreadingexercise = ReadingExercise::offset($offset)->limit($count)->get();

            // Tổng số trang
            $totalRows = ReadingExercise::count();

            $maxPageId = ceil($totalRows / $count);

            return view('admin.reading', compact('listreadingexercise', 'maxPageId', 'pageid'));
        } catch (\Exception $e) {
            return view('admin.reading')->with('error', $e->getMessage());
        }
    }
    public function edit(Request $request)
    {
        $readexerciseid = $request->input('readexerciseid');
        // Trả về view và truyền giá trị "grammarguidelineid" vào view
        return view('admin.insertreadcontent')->with('readexerciseid', $readexerciseid);
    }

    public function importExcel(Request $request)
    {
        // Kiểm tra xem file có tồn tại không
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        // Lấy file từ form
        $file = $request->file('excel_file');

        $readexerciseid = $request->input('readexerciseid');
        // Sử dụng gói Excel để đọc dữ liệu
        try {
            // Import dữ liệu từ file
            Excel::import(new ReadQuestionImport($readexerciseid), $file);

            return redirect()->back()->with('success', 'Dữ liệu đã được import thành công!');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors('Có lỗi xảy ra: ' . $e->getMessage());

        }
    }

    public function delete($readexerciseid)
    {
        $readexercise = ReadingExercise::find($readexerciseid);

        $readexercise->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}