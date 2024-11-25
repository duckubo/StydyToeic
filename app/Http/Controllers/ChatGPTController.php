<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ChatGPTController extends Controller
{
    public function chatInit()
    {
        return view("chat");
    }
    public function sendMessage(Request $request)
    {
        // Lấy API key từ môi trường
        $apiKey = env('OPENAI_API_KEY');

        // Tạo client Guzzle
        $client = new Client();

        // Cấu hình yêu cầu tới OpenAI API
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo', // Hoặc GPT-4 nếu bạn muốn
                'messages' => [
                    ['role' => 'user', 'content' => $request->input('message')],
                ],
            ],
        ]);
        echo $response;
        // Lấy nội dung trả về từ OpenAI
        $body = json_decode($response->getBody(), true);
        $gptReply = $body['choices'][0]['message']['content'];

        // Trả lại câu trả lời cho frontend
        return response()->json(['reply' => $gptReply]);
    }
}
