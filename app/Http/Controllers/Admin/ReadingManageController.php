<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReadingExercise;
use Illuminate\Http\Request;

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
        dd($readexerciseid);
        // Trả về view và truyền giá trị "grammarguidelineid" vào view
        return view('admin.insertreadcontent')->with('readexerciseid', $readexerciseid);
    }
}
