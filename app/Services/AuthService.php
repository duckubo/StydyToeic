<?php
namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register($params)
    {
        try {
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $params['password'] = Hash::make($params['password']);
            $params['role_id'] = 1;
            return $this->user->create($params);

        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }

    public function login($params)
    {
        try {
            // Kiểm tra xem người dùng có tồn tại không
            $user = $this->user->where('email', $params['email'])->first();

            // Nếu không tìm thấy người dùng, trả về false
            if (!$user) {
                return false;
            }

            // Kiểm tra mật khẩu của người dùng
            $isPasswordValid = Hash::check($params['password'], $user->password);

            if (!$isPasswordValid) {
                // Nếu mật khẩu sai, trả về false
                return false;
            }

            // Đăng nhập người dùng
            Auth::login($user);

            // Tạo token API cho người dùng khi đăng nhập thành công
            $token = $user->createToken('user')->plainTextToken;

            // Trả về true nếu đăng nhập thành công
            return true;

        } catch (Exception $e) {
            // Log lỗi nếu có sự cố
            Log::error($e);

            return false;
        }
    }

    public function logout()
    {
        Auth::logout();

        return true;
    }

    public function loginGoogle($params)
    {
        try {
            // Kiểm tra xem người dùng có tồn tại không
            $existedUser = $this->user->where('email', $params['email'])->first();

            if (!$existedUser) {
                $params['password'] = Hash::make($params['password']);
                $existedUser = $this->user->create($params);
            }

            // Đăng nhập người dùng
            Auth::login($existedUser);

            // Tạo token API cho người dùng khi đăng nhập thành công
            $existedUser->createToken('user')->plainTextToken;

            // Trả về true nếu đăng nhập thành công
            return true;

        } catch (Exception $e) {
            // Log lỗi nếu có sự cố
            Log::error($e);

            return false;
        }
    }
}
