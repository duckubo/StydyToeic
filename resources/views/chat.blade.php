<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with ChatGPT</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div id="chatbox">
        <form action="{{ url('/chat') }}" method="POST">
            @csrf
            <textarea name="message" placeholder="Type your message..."></textarea>
            <button type="submit">Send</button>
        </form>

        @if(isset($userMessage) && isset($gptReply))
            <div class="chat-message">
                <p><strong>You:</strong> {{ $userMessage }}</p>
                <p><strong>GPT:</strong> {{ $gptReply }}</p>
            </div>
        @endif
    </div>
</body>
</html>
