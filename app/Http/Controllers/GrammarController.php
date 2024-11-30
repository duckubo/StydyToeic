<?php

namespace App\Http\Controllers;

use App\Models\Cmtgrammar;
use App\Models\Grammarguideline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GrammarController extends Controller
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
            $grammarList = Grammarguideline::offset($offset)->limit($count)->get();

            // Đếm tổng số dòng trong bảng
            $totalRows = Grammarguideline::count();

            // Tính tổng số trang
            $maxPageId = ceil($totalRows / $count);
            // Truyền dữ liệu qua view
            return view('grammarguideline', [
                'grammarList' => $grammarList, // Truyền danh sách vào view
                'maxPageId' => $maxPageId,
                'currentPage' => $pageId,
            ]);

        } catch (\Exception $e) {
            // Xử lý lỗi và hiển thị thông báo
            return view('grammarguideline')->with('errorMessage', $e->getMessage());
        }
    }
    public function show($grammarguidelineid)
    {
        // Lấy chủ đề từ vựng theo ID
        $grammar = Grammarguideline::where('grammarguidelineid', $grammarguidelineid)->first();

        // Kiểm tra nếu không tìm thấy
        if (!$grammar) {
            return redirect()->route('somewhere')->with('msg', 'Không tìm thấy chủ đề từ vựng');
        }

        $listcommentgrammar = Cmtgrammar::where('grammarguidelineid', $grammarguidelineid)->get();

        $countrow = 1;
        return view('grammmarguidelineshow', compact('grammar', 'listcommentgrammar', 'countrow'));

    }
    public function commentHandle(Request $request)
    {
        // Lấy dữ liệu từ request
        $memberid = Auth::id(); // Lấy id của user đang đăng nhập
        $cmtgrammarcontent = $request->input('cmtgrammarcontent', "abc");
        $grammarguidelineid = (int) $request->input('grammarguidelineid', 1);

        // Tạo đối tượng mới và lưu vào DB
        $cmtgrammar = new Cmtgrammar();
        $cmtgrammar->cmtgrammarcontent = $cmtgrammarcontent;
        $cmtgrammar->memberid = $memberid;
        $cmtgrammar->grammarguidelineid = $grammarguidelineid;
        $cmtgrammar->save();

        // Lấy danh sách comment grammar theo grammarguidelineid
        $list = Cmtgrammar::where('grammarguidelineid', $grammarguidelineid)->get();

        // Gửi dữ liệu qua view
        return view('partials.listcmtgrammarguide', ['listcommentgrammar' => $list]);

    }
}
