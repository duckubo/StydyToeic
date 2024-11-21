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
}
