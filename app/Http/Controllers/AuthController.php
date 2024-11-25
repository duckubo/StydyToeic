<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Xử lý đăng ký
    public function register(RegisterRequest $registerRequest)
    {
        $params = $registerRequest->validated();
        $result = $this->authService->register($params);
        if ($result) {
            return redirect()->route('form_login');
        }
        return redirect()->route('register')->with('msgregister', "Lỗi khi tạo tài khoản!");
    }
    public function formLogin()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $loginRequest)
    {
        $params = $loginRequest->validated();
        $result = $this->authService->login($params);
        if ($result) {
            $role_id = Auth::user()->role_id;

            if ($role_id == '1') {
                return redirect()->route('home');
            } elseif ($role_id == '2') {

                return redirect()->route('admin.dashboard');
            }
        }
        return redirect()->route('form_login')->with('msglogin', "Email hoặc mật khẩu không chính xác!");
    }
    public function logout()
    {
        $result = $this->authService->logout();

        if ($result) {
            return redirect()->route('form_login');
        }
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            // dd($googleUser);

            $result = $this->authService->loginGoogle([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => $googleUser->id,
                'role_id' => 1,
            ]);

            if ($result) {
                return redirect()->route('home');
            }

            return redirect()->route('form_login')->with('msglogin', "Vui lòng thử lại sau!");
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Something went wrong. Please try again.');
        }
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
        return view('profile', compact('user'));
    }
    public function update(Request $request)
    {
        // Lấy người dùng hiện tại
        $user = Auth::user();
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

        // Nếu có mật khẩu mới, cập nhật mật khẩu
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Nếu có ảnh đại diện, lưu ảnh và cập nhật đường dẫn
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

        // Lưu thay đổi
        $user->save();

        // Redirect hoặc trả về thông báo thành công
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
    public function showResetLinkEmailForm()
    {
        return view('auth.passwordresetLink');

    }
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
        ? back()->with('success', 'Reset Password link sent!')
        : back()->with('error', 'Reset Password link sent failed');
    }
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
        ? back()->with('success', 'Reset Password successfully!')
        : back()->with('error', 'Reset Password failed');
    }
}
