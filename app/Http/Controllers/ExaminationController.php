<?php

namespace App\Http\Controllers;

use App\Models\AnswerUser;
use App\Models\Examination;
use App\Models\ExaminationQuestion;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminationController extends Controller
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
            $examList = Examination::offset($offset)->limit($count)->get();

            // Đếm tổng số dòng trong bảng
            $totalRows = Examination::count();

            // Tính tổng số trang
            $maxPageId = ceil($totalRows / $count);
            // Truyền dữ liệu qua view
            return view('examination', [
                'examList' => $examList, // Truyền danh sách vào view
                'maxPageId' => $maxPageId,
                'currentPage' => $pageId,
            ]);

        } catch (\Exception $e) {
            // Xử lý lỗi và hiển thị thông báo
            return view('examination')->with('errorMessage', $e->getMessage());
        }
    }
    public function show(Request $request)
    {
        if (Auth::check()) {
            $examinationid = $request->input('examinationid');

            // Lấy chủ đề từ vựng theo ID
            $questions = ExaminationQuestion::where('examinationid', $examinationid)->get();
            if (Auth::check()) {
                $memberid = Auth::user()->id;
            } else {
                $memberid = null; // Hoặc xử lý theo ý bạn
            }
            // Kiểm tra nếu không tìm thấy
            if (!$questions) {
                return redirect()->route('somewhere')->with('msg', 'Không tìm thấy chủ đề từ vựng');
            }
            $countrow = 1;
            return view('examinationshow', compact('questions', 'examinationid', 'memberid'));

        } else {
            return redirect()->route('examination', ['pageid' => 1])->with('errorMessage', 'Đăng nhập trước khi làm bài thi');
        }

    }
    public function result(Request $request)
    {
        $examinationid = $request->input('examinationid');
        $memberid = $request->input('memberid');

        // Tính số lượng câu hỏi trong đề thi
        $countrow = ExaminationQuestion::where('examinationid', $examinationid)->count();

        // Lấy danh sách câu trả lời đúng
        $listcorrectanswer = ExaminationQuestion::where('examinationid', $examinationid)->get();
        // Khởi tạo danh sách câu trả lời của người dùng
        $listansweruser = [];

        $socaudung = 0;
        $socaudungphannghe = 0;
        $socaudungphandoc = 0;
        for ($i = 1; $i <= $countrow; $i++) {
            $answer = $request->input("ans.$i");
            if ($answer != null) {
                // Lưu câu trả lời của người dùng
                $au = new Answeruser();
                $au->setNum($i);
                $au->setAnswer($answer);
                $listansweruser[] = $au;

                // Kiểm tra đáp án đúng
                $dapandung = ExaminationQuestion::where('examinationid', $examinationid)
                    ->where('num', $i)
                    ->value('correctanswer');

                if ($i <= 4) {
                    if ($answer === $dapandung) {
                        $socaudung++;
                        $socaudungphannghe++;
                    }
                } else {
                    if ($i >= 5) {
                        if ($answer === $dapandung) {
                            $socaudung++;
                            $socaudungphandoc++;
                        }
                    }
                }
            } else {
                $au = new AnswerUser();
                $au->setNum($i);
                $au->setAnswer("Không chọn");
                $listansweruser[] = $au;

            }
        }

        $date = now();

        $socausai = $countrow - $socaudung;

        // Tạo đối tượng kết quả
        $result = new Result();
        $result->correctanswernum = $socaudung;
        $result->incorrectanswernum = $socausai;
        $result->time = $date->toDateString();
        $result->examinationid = $examinationid;
        $result->memberid = $memberid;
        $result->correctanswerlisten = $socaudungphannghe;
        $result->correctanswerread = $socaudungphandoc;
        $result->save();

        // Truyền kết quả vào view
        $list = Result::where('examinationid', $examinationid)
            ->where('memberid', $memberid)
            ->where('time', $date->toDateString())
            ->orderBy('resultid', 'desc')
            ->get();
        return view('results.examination', [
            'listcorrectanswer' => $listcorrectanswer,
            'listansweruser' => $listansweruser,
            'examinationid' => $examinationid,
            'ketquathi' => $list,
        ]);
    }
}
