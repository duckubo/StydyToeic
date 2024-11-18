<?php

namespace App\Http\Controllers;

use App\Models\ListeningExercise;
use App\Models\ListeningQuestion;
use Illuminate\Http\Request;

class ListeningController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Lấy pageid từ request và thiết lập các thông số phân trang
            $pageId = $request->query('pageid', 1); // Giá trị mặc định là 1 nếu không có pageid
            $count = 4;

            if ($pageId == 1) {
                $offset = 0;
            } else {
                $offset = ($pageId - 1) * $count;
            }

            // Truy vấn danh sách từ vựng
            $listenexerciseList = ListeningExercise::offset($offset)->limit($count)->get();
            // Đếm tổng số dòng trong bảng
            $totalRows = ListeningExercise::count();

            // Tính tổng số trang
            $maxPageId = ceil($totalRows / $count);

            // Truyền dữ liệu qua view
            return view('listeningexercise', [
                'listenexerciseList' => $listenexerciseList,
                'maxPageId' => $maxPageId,
                'currentPage' => $pageId,
            ]);

        } catch (\Exception $e) {
            // Xử lý lỗi và hiển thị thông báo
            return view('listeningexercise')->with('errorMessage', $e->getMessage());
        }
    }
    public function show(Request $request)
    {
        // Lấy các tham số từ query string
        $pageid = $request->query('pageid', 1);
        $listenexerciseid = $request->query('listenexerciseid');

        $count = 1;

        if ($pageid == 1) {
            // No adjustment needed
        } else {
            $pageid = ($pageid - 1) * $count + 1;
        }

        // Query the data using Eloquent or Query Builder
        $listenexercises = ListeningQuestion::where('listenexerciseid', $listenexerciseid)
            ->skip($pageid - 1) // Paginate by skipping records
            ->take($count) // Limit the results per page
            ->get();

        // Get the total count of rows
        $sumrow = ListeningQuestion::where('listenexerciseid', $listenexerciseid)->count();

        // Tính tổng số trang
        $maxPageId = ceil($sumrow / $count);

        if (!$listenexercises) {
            return redirect()->route('somewhere')->with('msg', 'Không tìm thấy chủ đề từ vựng');
        }

        // Trả về view với dữ liệu chủ đề từ vựng
        return view('listeningexerciseshow', [
            'listenexercises' => $listenexercises,
            'listenexerciseid' => $listenexerciseid,
            'maxPageId' => $maxPageId,
            'currentPage' => $pageid,
        ]);
    }
}
