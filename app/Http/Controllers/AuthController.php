<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;

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
            return redirect()->route('home');
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

}
