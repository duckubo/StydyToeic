<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {

        $users = User::with('role')->get();

        // Lấy năm hiện tại
        $currentYear = now()->year;

        // Truy xuất dữ liệu từ bảng users
        $accounts = DB::table('users')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $currentYear) // Chỉ lấy dữ liệu trong năm nay
            ->groupBy('month')
            ->pluck('total', 'month'); // Trả về danh sách [month => total]

        $data = [];
        for ($i = 1; $i <= 12; $i++) {
            $data[] = $accounts[$i] ?? 0; // Giá trị hoặc 0 nếu không có dữ liệu
        }

        return view('Admin.account', compact('users', 'data'));
    }
}
