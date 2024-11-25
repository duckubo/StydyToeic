<?php

namespace App\Http\Controllers;

use App\Services\AwsSnsService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected $snsService;

    public function __construct(AwsSnsService $snsService)
    {
        $this->snsService = $snsService;
    }
    public function showForm(Request $request)
    {
        $phone = $request->input('phone');

        return view('Admin.send_sms', compact('phone'));
    }
    public function sendSMS(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^\+[1-9]\d{1,14}$/', // Kiểm tra định dạng số điện thoại quốc tế
            'message' => 'required|string|max:160',
        ]);

        $phone = $request->input('phone');
        $message = $request->input('message');

        $result = $this->snsService->sendSMS($phone, $message);
        // Kiểm tra nếu $result là một đối tượng và có phương thức get() để lấy MessageId
        if ($result instanceof \Aws\Result  && isset($result['MessageId'])) {
            return redirect()->route('send.sms.form')->with('success', 'SMS sent successfully!');
        } else {
            return redirect()->route('send.sms.form')->with('error', 'Failed to send SMS: ' . $result);
        }

    }
}
