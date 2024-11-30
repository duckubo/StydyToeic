<?php

namespace App\Http\Controllers;

use App\Models\Vocabularycontent;
use App\Models\Vocabularyguideline;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Lấy pageid từ request và thiết lập các thông số phân trang
            $pageId = $request->input('pageid', 1); // Giá trị mặc định là 1 nếu không có pageid
            $count = 4;

            if ($pageId == 1) {
                $offset = 0;
            } else {
                $offset = ($pageId - 1) * $count;
            }

            // Truy vấn danh sách từ vựng
            $vocabularyList = Vocabularyguideline::offset($offset)->limit($count)->get();
            // Đếm tổng số dòng trong bảng
            $totalRows = Vocabularyguideline::count();

            // Tính tổng số trang
            $maxPageId = ceil($totalRows / $count);

            // Truyền dữ liệu qua view
            return view('vocabularyguideline', [
                'vocabularyList' => $vocabularyList,
                'maxPageId' => $maxPageId,
                'currentPage' => $pageId,
            ]);

        } catch (\Exception $e) {
            // Xử lý lỗi và hiển thị thông báo
            return view('vocabularyguideline')->with('errorMessage', $e->getMessage());
        }
    }
    public function show($vocabularyguidelineid)
    {
        // Lấy chủ đề từ vựng theo ID
        $vocabulary = Vocabularycontent::where('vocabularyguidelineid', $vocabularyguidelineid)->get();
        // Kiểm tra nếu không tìm thấy
        if (!$vocabulary) {
            return redirect()->route('somewhere')->with('msg', 'Không tìm thấy chủ đề từ vựng');
        }
        // Trả về view với dữ liệu chủ đề từ vựng
        return view('vocabularyshow', compact('vocabulary'));
    }
}
