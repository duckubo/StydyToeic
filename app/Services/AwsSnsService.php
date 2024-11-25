<?php

namespace App\Services;

use Aws\Exception\AwsException;
use Aws\Sns\SnsClient;

class AwsSnsService
{
    protected $snsClient;

    public function __construct()
    {
        $this->snsClient = new SnsClient([
            'version' => 'latest',
            'region' => config('services.sns.region'),
            'credentials' => [
                'key' => config('services.sns.key'),
                'secret' => config('services.sns.secret'),
            ],
        ]);
    }

    public function sendSMS($to, $message)
    {
        try {
            // Gửi SMS
            $result = $this->snsClient->publish([
                'Message' => $message, // Nội dung tin nhắn
                'PhoneNumber' => $to, // Số điện thoại người nhận
            ]);
            if ($result->get('@metadata')['statusCode'] == 200) {
                // SMS đã được gửi thành công
                $messageId = $result->get('MessageId');
                return $result;
                // Xử lý thành công (ví dụ, lưu MessageId vào cơ sở dữ liệu)
            } else {
                return 'Failed to send SMS: No MessageId returned.';

            }
        } catch (AwsException $e) {
            // Xử lý lỗi nếu có
            return 'Error: ' . $e->getMessage();
        }
    }

}
