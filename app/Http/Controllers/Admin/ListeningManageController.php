<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListeningExercise;
use Illuminate\Http\Request;

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
        return view('admin.media');
    }

    public function media_insert(Request $request)
    {
        dd($request->all());
        return view('admin.media');
    }
}
