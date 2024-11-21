<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vocabularyguideline;
use Illuminate\Http\Request;

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
}
