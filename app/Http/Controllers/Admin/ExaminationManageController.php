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
}
