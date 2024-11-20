<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $users = collect([
            (object) ['id' => 1, 'name' => 'Nguyễn Văn A', 'email' => 'vana@example.com', 'role' => 'Admin'],
            (object) ['id' => 2, 'name' => 'Trần Thị B', 'email' => 'thib@example.com', 'role' => 'User'],
            (object) ['id' => 3, 'name' => 'Lê Minh C', 'email' => 'minhc@example.com', 'role' => 'Moderator'],
        ]);
        // Lấy năm hiện tại
        $currentYear = now()->year;

        // Truy xuất dữ liệu từ bảng users
        $accounts = DB::table('users')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $currentYear) // Chỉ lấy dữ liệu trong năm nay
            ->groupBy('month')
            ->pluck('total', 'month'); // Trả về danh sách [month => total]

        // Tạo nhãn và dữ liệu cho Chart.js
        // $data = [];
        // for ($i = 1; $i <= 12; $i++) {
        //     $data[] = $accounts[$i] ?? 0; // Giá trị hoặc 0 nếu không có dữ liệu
        // }
        $data = [120, 150, 170, 200, 250, 300, 400];

        return view('Admin.account', compact('users', 'data'));
    }
}
