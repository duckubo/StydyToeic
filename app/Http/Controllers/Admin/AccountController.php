<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        // Validate dữ liệu người dùng
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate ảnh
        ]);

        // Lưu thông tin người dùng mới
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Mã hóa mật khẩu
        $user->role_id = $request->role_id; // Lưu vai trò
        if ($request->hasFile('profile_picture')) {
            // Lấy file ảnh
            $image = $request->file('profile_picture');

            // Tạo tên ảnh mới
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Lưu ảnh vào thư mục public/images
            $image->move(public_path('images'), $imageName);

            // Cập nhật tên ảnh trong cơ sở dữ liệu
            $user->profile_picture = 'images/' . $imageName;
        }

        $user->save();

        return redirect()->route('admin.account')->with('success', 'Người dùng đã được tạo thành công!');
    }
    public function profile($id)
    {
        // Lấy thông tin user hiện tại
        $user = User::find($id);

        // Kiểm tra xem user đã đăng nhập chưa
        if (!$user) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem trang cá nhân.');
        }

        // Trả về view kèm thông tin user
        return view('Admin.profile', compact('user'));
    }
    public function update(Request $request)
    {
        $id = $request->input('id');
        // Lấy người dùng hiện tại
        $user = User::find($id);
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'password' => 'nullable|min:6',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Chỉ chấp nhận file ảnh
        ]);
        // Cập nhật thông tin người dùng
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role_id = $request->input('role_id');

        // Nếu có mật khẩu mới, cập nhật mật khẩu
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Nếu có ảnh đại diện, lưu ảnh và cập nhật đường dẫn
        if ($request->hasFile('profile_picture')) {
            // Lấy file ảnh
            $image = $request->file('profile_picture');

            // Tạo tên ảnh mới
            $imageName = time() . '.' . $image->getClientOriginalName();

            // Lưu ảnh vào thư mục public/images
            $image->move(public_path('images'), $imageName);

            // Cập nhật tên ảnh trong cơ sở dữ liệu
            $user->profile_picture = 'images/' . $imageName;
        }

        // Lưu thay đổi
        $user->save();

        // Redirect hoặc trả về thông báo thành công
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
