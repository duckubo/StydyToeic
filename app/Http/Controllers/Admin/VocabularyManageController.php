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
        $fileCount = count($files); // Đếm số lượng file

        echo "Số lượng file đã upload: " . $fileCount;

    }
}
