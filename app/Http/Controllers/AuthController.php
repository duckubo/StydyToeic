<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

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

}
