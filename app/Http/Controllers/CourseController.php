<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
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
            $courses = Course::offset($offset)->limit($count)->get();
            // Đếm tổng số dòng trong bảng
            $totalRows = Course::count();

            // Tính tổng số trang
            $maxPageId = ceil($totalRows / $count);

            // Truyền dữ liệu qua view
            return view('courses', [
                'ismycourse' => 0,
                'courses' => $courses,
                'maxPageId' => $maxPageId,
                'currentPage' => $pageId,
            ]);

        } catch (\Exception $e) {
            // Xử lý lỗi và hiển thị thông báo
            return view('courses')->with('errorMessage', $e->getMessage());
        }
    }

    public function show($courseid)
    {
        if (auth()->check()) {
            $userId = auth()->id();
        } else {
            return redirect('login');
        }
        $course = Course::findOrFail($courseid);
        $user = User::find($userId);
        $enroll = $user->enrollments()->where('course_id', $courseid)->first();
        if ($enroll) {
            $is_enroll = $enroll->is_success;
        } else {
            $is_enroll = false;
        }
        $lessons = $course->lessons;
        return view('coursedetail', compact('course', 'lessons', 'is_enroll'));
    }

    public function enroll($courseid)
    {
        if (auth()->check()) {
            $userId = auth()->id();
        } else {
            return redirect('login');
        }

        // Insert into Enrollment
        $user = User::find($userId);
        $course = Course::findOrFail($courseid);
        $vnp_TxnRef = "enroll{$course->id}{$userId}";
        $enrollmentData = [
            'user_id' => $userId,
            'course_id' => $course->id,
            'phone' => $user->phone,
            'enroll_code' => $vnp_TxnRef,
            'payment_content' => '',
        ];
        Enrollment::create($enrollmentData);

        // Vnpay config
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        // Sửa url khi chạy lại ngrok
        $vnp_Returnurl = 'https://19fa-2401-d800-2740-e22-4e1-c8b0-d74a-9c14.ngrok-free.app/return-payment';
        $vnp_TmnCode = "GY1TKPFT";
        $vnp_HashSecret = "CXHOO01MZM7UOS1W8IIEQPKBGFLQQ53C";
        $vnp_OrderInfo = "Dang ky khoa hoc";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $course->price * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        // $vnp_ExpireDate = $_POST['txtexpire'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_BankCode" => $vnp_BankCode,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ReturnUrl" => $vnp_Returnurl,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'enroll_code' => $vnp_TxnRef
            , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
    }

    public function showLession($lessionid)
    {
        $lession = Lesson::find($lessionid);
        $nextLes = Lesson::where('id', '>', $lession->id)
            ->orderBy('id', 'asc')
            ->first();
        return view('lession', compact('lession', 'nextLes'));
    }

    public function returnPayment(Request $request)
    {
        $enrollcode = $request->input('vnp_TxnRef');
        $price = $request->input('vnp_Amount');
        $price = $price / 100;
        $enrollment = Enrollment::where('enroll_code', $enrollcode)->first();
        if ($enrollment) {
            $enrollment->is_success = true;
            $enrollment->price = $price;
            $enrollment->save();
        }
        return view('returnpayment', compact('enrollcode', 'price'));
    }

    public function myCourses(Request $request)
    {

        if (auth()->check()) {
            $userId = auth()->id();
        } else {
            return redirect('login');
        }
        $enrollments = Enrollment::where('user_id', $userId)->where('is_success', 1)->get();
        $courses = [];
        foreach ($enrollments as $enroll) {
            $course = Course::find($enroll->course_id);

            if ($course) {
                $courses[] = $course;
            }
        }
        try {
            // Lấy pageid từ request và thiết lập các thông số phân trang
            $pageId = $request->query('pageid', 1); // Giá trị mặc định là 1 nếu không có pageid
            $count = 2;

            if ($pageId == 1) {
                $offset = 0;
            } else {
                $offset = ($pageId - 1) * $count;
            }
            $totalRows = count($courses);

            $courses = array_slice($courses, $offset, $count);

            // Tính tổng số trang
            $maxPageId = ceil($totalRows / $count);

            // Truyền dữ liệu qua view
            return view('courses', [
                'ismycourse' => 1,
                'courses' => $courses,
                'maxPageId' => $maxPageId,
                'currentPage' => $pageId,
            ]);

        } catch (\Exception $e) {
            // Xử lý lỗi và hiển thị thông báo
            return view('courses')->with('errorMessage', $e->getMessage());
        }
        return view('courses', compact('courses'));
    }
}
