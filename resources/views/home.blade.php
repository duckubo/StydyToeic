@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<div class="container">
    <div class="row">
        <div class="span6">
            <div id="size">
                <form name="myform">
                    <input type="text" class="form-control" placeholder="{{ __('label.search') }}"
                        style="width:500px; height:35px;" name="grammarname" onkeyup="Search()">
                </form>
            </div>

        </div>
    </div>
    <div class="container" id="searchresult">
        <!-- Carousel -->
        <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">

                <!-- Slide đầu tiên -->
                <div class="active item">
                    <div class="container">
                        <div class="row">
                            <div class="span6">
                                <div class="carousel-caption">
                                    <h1>{{ __('label.listening_reading_guide') }}</h1>
                                    <p class="lead">{{ __('label.best_knowledge') }}</p>
                                    <a class="btn btn-large btn-primary" href="#">{{ __('label.join_now') }}</a>
                                </div>
                            </div>
                            <div class="span6">
                                <img src="{{ asset('images/slide/slide1.jpg') }}" height="350" width="350"
                                    alt="Slide 1">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Các slide từ danh sách  -->
                @foreach ($listslidebanner as $list)
                    <div class="item">
                        <div class="container">
                            <div class="row">
                                <div class="span6">
                                    <div class="carousel-caption">
                                        <h1>{{ $list->slidename }}</h1>
                                        <p class="lead">{{ $list->slidecontent }}</p>
                                        <a class="btn btn-large btn-primary" href="#">{{ __('label.join_now') }}</a>
                                    </div>
                                </div>
                                <div class="span6">
                                    <img src="{{ asset('images/slide/' . $list->slideimage) }}" height="350" width="350"
                                        alt="slide Name">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Điều hướng Carousel -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev"><i class="icon-chevron-left"></i></a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next"><i
                    class="icon-chevron-right"></i></a>
        </div>
        <!-- /.Carousel -->
        <!-- Feature -->
        <div class="row feature-box">
            <div class="span12 cnt-title">
                <h1>{{ __('label.user_friendly_interface') }}</h1>
                <span>{{ __('label.practice_test') }}</span>
            </div>

            <div class="span4">
                <img src="{{ asset('images/guideline.png') }}" alt="Guideline">
                <h2>{{ __('label.vocabulary_grammar_guide') }}</h2>
                <p>{{ __('label.exam_relevant_guides') }}</p>
                <a href="#" data-toggle="modal" data-target="#myModal">{{ __('label.detail') }} &rarr;</a>
            </div>

            <div class="span4">
                <img src="{{ asset('images/exercises.png') }}" alt="Exercises">
                <h2>{{ __('label.listening_reading_exercises') }}</h2>
                <p>{{ __('label.toeic_mock_test') }}</p>
                <a href="#" data-toggle="modal" data-target="#myModal1">{{ __('label.detail') }} &rarr;</a>
            </div>

            <div class="span4">
                <img src="{{ asset('images/thitoeic.png') }}" alt="Thi thử Toeic">
                <h2>{{ __('label.mock_exam') }}</h2>
                <p>{{ __('label.realistic_mock_exam') }}</p>
                <a href="{{ route('examination', ['pageid' => 1]) }}">{{ __('label.detail') }} &rarr;</a>
            </div>
        </div>
        <!-- /.Feature -->

        <div class="hr-divider"></div>

        <!-- Row View -->
        <div class="row">
            <div class="span6">
                <img src="{{ asset('images/responsive.png') }}" alt="Responsive">
            </div>

            <div class="span6">
                <img class="hidden-phone" src="{{ asset('images/icon4.png') }}" alt="Icon 4">
                <h1>{{ __('label.mock_toeic_exam') }}</h1>
                <p>{{ __('label.exam_description') }}</p>
                <a href="#">{{ __('label.detail') }} &rarr;</a>
            </div>
        </div>

    </div>
</div>

<div class="chat-icon">
    <div>
        <div>
            <span>Hỗ trợ trực tuyến!</span>
        </div>
    </div>
    <a href="{{ route('chatify') }}" target="_blank">
        <img src="{{ asset('images/chat-realtime.png') }}" alt="Live Chat Support" />
    </a>
</div>

<div class="chatboxai">
    <div>
        <div>
            <span>Chat với chúng tôi!</span>
        </div>
    </div>
    <img src="{{asset('images/chatbox.png')}}" id="toggleChatBtn" alt='' />

</div>

<div id="chatbox" class="chatbox">
    <div class="chatbox-header" style="justify-content: end;">
        <button id="closeChatBtn">Đóng</button>
    </div>
    <div id="messages" class="chatbox-content">
        <p>Chào bạn! Bạn cần hỗ trợ gì?</p>
    </div>

    <div class="chatbox-footer" style="">
        <div style="margin: 10px 10px 0px 0px; position:relative;" id="prompt">
            <div class="menu-prompts" id="menuPrompts" style="position:absolute;bottom: 44px; left:-6px;">
                <button class="menu-btn" data-question="website này cung cấp gì">Website này cung cấp gì?</button>
                <button class="menu-btn" data-question="các loại bài thi có sẵn là gì">Các loại bài thi có sẵn là
                    gì?</button>
                <button class="menu-btn" data-question="làm thế nào để làm bài thi">Làm thế nào để làm bài thi?</button>
                <button class="menu-btn" data-question="có giới hạn thời gian cho bài thi không">Có giới hạn thời gian
                    cho bài thi không?</button>
                <button class="menu-btn" data-question="làm thế nào để kiểm tra kết quả">Làm thế nào để kiểm tra kết
                    quả?</button>
                <button class="menu-btn" data-question="làm thế nào để cải thiện điểm số">làm thế nào để cải thiện điểm
                    số?</button>
            </div>
            <i class="fa fa-list" aria-hidden="true"></i>
        </div>
        <input type="text" id="message-input" placeholder="Nhập câu hỏi...">
        <button id="sendBtn">Gửi</button>
    </div>
</div>
<div id="size1">
    @include('includes.footer')
</div>
<!-- start Modal -->
<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ __('label.guide_category_list') }}</h4>
            </div>
            <div class="modal-body">

                <div class="media">
                    <a class="pull-left"><img src="{{asset('images/loaibtnghe.png')}}" class="media-object"
                            alt='' /></a>
                    <div class="media-body">
                        <h4>
                            <a
                                href="{{ route('vocabularyguideline', ['pageid' => 1]) }}">{{ __('label.vocabulary_guide_article') }}</a>
                        </h4>
                    </div>
                </div>

                <div class="media">
                    <a class="pull-left"><img src="{{asset('images/loaibtdoc.png')}}" class="media-object" alt='' /></a>
                    <div class="media-body">
                        <h4>
                            <a href="grammarguideline?pageid=1">{{ __('label.grammar_guide_article') }}</a>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('label.exit') }}</button>
            </div>
        </div>

    </div>
</div>
<!-- end modal -->
<!-- start Modal làm bt -->
<div class="modal fade" id="myModal1" role="dialog" style="display:none">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ __('label.exercise_category_list') }}</h4>
            </div>
            <div class="modal-body">

                <div class="media">
                    <a class="pull-left"><img src="{{asset('images/loaibtnghe.png')}}" class="media-object"
                            alt='' /></a>
                    <div class="media-body">
                        <h4>
                            <a href="{{ route('listeningexercise', ['pageid' => 1]) }}">{{ __('label.listenex') }}</a>
                        </h4>
                    </div>
                </div>

                <div class="media">
                    <a class="pull-left"><img src="{{asset('images/loaibtdoc.png')}}" class="media-object" alt='' /></a>
                    <div class="media-body">
                        <h4>
                            <a href="{{ route('readingexercise', ['pageid' => 1]) }}">{{ __('label.readex') }}</a>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('label.exit') }}</button>
            </div>
        </div>

    </div>
</div>
<!-- end modal -->

@endsection
@section('scripts')

<script type="text/javascript">
    // Lấy các phần tử trong HTML
    // Lấy các phần tử trong HTML
    const chatbox = document.getElementById("chatbox");
    const prompt = document.getElementById("prompt");
    const menuPrompts = document.getElementById("menuPrompts");

    const toggleChatBtn = document.getElementById("toggleChatBtn");
    const closeChatBtn = document.getElementById("closeChatBtn");
    const buttons = menuPrompts.querySelectorAll('.menu-btn');

    // Lắng nghe sự kiện click vào nút toggle
    toggleChatBtn.addEventListener("click", function () {
        if (chatbox.style.display === "none" || chatbox.style.display === "") {
            chatbox.style.display = "block"; // Hiển thị chatbox
            toggleChatBtn.style.display = "none";
        } else {
            chatbox.style.display = "none"; // Ẩn chatbox
            toggleChatBtn.style.display = "block";
        }
    });
    prompt.addEventListener("click", function () {
        if (menuPrompts.style.display === "none" || menuPrompts.style.display === "") {
            menuPrompts.style.display = "block"; // Hiển thị chatbox
        } else {
            menuPrompts.style.display = "none"; // Ẩn chatbox
        }
    });

    // Lắng nghe sự kiện click vào nút đóng chatbox
    closeChatBtn.addEventListener("click", function () {
        chatbox.style.display = "none"; // Ẩn chatbox khi click vào nút đóng
        toggleChatBtn.style.display = "block";
    });
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const message = button.getAttribute('data-question');
            var messages = document.getElementById("messages");
            var userMessage = document.createElement("div");
            userMessage.classList.add("message");
            userMessage.textContent = "Bạn: " + message;
            messages.appendChild(userMessage);

            // Lấy nội dung từ thuộc tính data-question
            var botResponse = getBotResponse(message);
            var botMessage = document.createElement("div");
            botMessage.classList.add("message");
            botMessage.textContent = "Bot: " + botResponse;
            messages.appendChild(botMessage);

            // Cuộn xuống dưới khi có tin nhắn mới
            messages.scrollTop = messages.scrollHeight;
        });
    });
    document
        .getElementById("sendBtn")
        .addEventListener("click", function () {
            var messageInput = document.getElementById("message-input");
            var message = messageInput.value.trim();

            if (message !== "") {
                // Hiển thị câu hỏi của người dùng
                var messages = document.getElementById("messages");
                var userMessage = document.createElement("div");
                userMessage.classList.add("message");
                userMessage.textContent = "Bạn: " + message;
                messages.appendChild(userMessage);

                // Trả lời tự động từ bot
                var botResponse = getBotResponse(message);

                // Hiển thị câu trả lời của bot
                var botMessage = document.createElement("div");
                botMessage.classList.add("message");
                botMessage.textContent = "Bot: " + botResponse;
                messages.appendChild(botMessage);

                // Cuộn xuống dưới khi có tin nhắn mới
                messages.scrollTop = messages.scrollHeight;

                // Xóa nội dung ô nhập liệu
                messageInput.value = "";
            }
        });

    // Định nghĩa các câu trả lời tự động
    function getBotResponse(message) {
        message = message.toLowerCase();

        if (message.includes("xin chào") || message.includes("hello")) {
            return "Chào bạn! Tôi có thể giúp gì cho bạn?";
        } else if (message.includes("cảm ơn")) {
            return "Bạn thật tuyệt vời! Nếu cần thêm gì, cứ hỏi tôi nhé!";
        } else if (message.includes("thời tiết")) {
            return "Tôi không biết thời tiết hôm nay, nhưng bạn có thể kiểm tra trên Google!";
        } else if (message.includes("website này cung cấp gì")) {
            return "Website này cung cấp các bài thi tiếng Anh online để giúp người dùng cải thiện kỹ năng tiếng Anh của mình.";
        } else if (message.includes("làm thế nào để đăng ký")) {
            return "Bạn có thể đăng ký bằng cách nhấn vào nút 'Đăng Ký' và điền thông tin của mình.";
        } else if (message.includes("các loại bài thi có sẵn là gì")) {
            return "Chúng tôi cung cấp nhiều loại bài thi tiếng Anh, bao gồm ngữ pháp, từ vựng, đọc hiểu và viết.";
        } else if (message.includes("làm thế nào để làm bài thi")) {
            return "Để làm bài thi, bạn chỉ cần đăng nhập vào tài khoản của mình, chọn bài thi và bắt đầu trả lời các câu hỏi.";
        } else if (message.includes("có giới hạn thời gian cho bài thi không")) {
            return "Có, hầu hết các bài thi đều có giới hạn thời gian để mô phỏng điều kiện thi thật, nhưng bạn có thể xem lại câu trả lời trước khi nộp bài.";
        } else if (message.includes("làm thế nào để kiểm tra kết quả")) {
            return "Sau khi hoàn thành bài thi, kết quả sẽ có sẵn trong phần 'Kết Quả' của tài khoản của bạn.";
        } else if (message.includes("tôi có thể làm lại bài thi không")) {
            return "Có, bạn có thể làm lại bài thi bất cứ lúc nào, nhưng hãy xem lại những lỗi đã mắc phải để cải thiện.";
        } else if (message.includes("làm thế nào để cải thiện điểm số")) {
            return "Để cải thiện điểm số, bạn nên luyện tập thường xuyên và xem lại các lỗi trong các bài thi trước.";
        } else if (message.includes("tôi có cần tài khoản để làm bài thi không")) {
            return "Có, bạn cần tạo tài khoản để làm bài thi và theo dõi tiến trình của mình.";
        } else if (message.includes("làm thế nào để liên hệ với hỗ trợ")) {
            return "Bạn có thể liên hệ với bộ phận hỗ trợ bằng cách nhấn vào nút 'Trợ Giúp' ở dưới cùng của trang và gửi tin nhắn.";
        }
        else {
            return "Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể thử hỏi lại không?";
        }
    }

    function Search() {
        var xhttp;
        var grammarname = document.myform.grammarname.value;

        if (grammarname !== "") {
            var url = "{{ route('search') }}";

            // Tạo đối tượng XMLHttpRequest
            if (window.XMLHttpRequest) {
                xhttp = new XMLHttpRequest();
            } else {
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // Khi yêu cầu hoàn tất
            xhttp.onreadystatechange = function () {
                if (xhttp.readyState === 4 && xhttp.status === 200) {
                    var data = xhttp.responseText;
                    document.getElementById("searchresult").innerHTML = data;
                }
            };

            // Gửi yêu cầu POST với tham số 'grammarname'
            xhttp.open("POST", url, true);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
            xhttp.send("grammarname=" + encodeURIComponent(grammarname));

        } else {
            document.getElementById("searchresult").innerHTML =
                "{{ __('label.back_to_home') }}";
        }
        console.log('ok');

    }
</script>
<script src="https://app.tudongchat.com/js/chatbox.js"></script>
<script>
    const tudong_chatbox = new TuDongChat('MNOCdr2vIL14VCKZqafzN')
    tudong_chatbox.initial()
</script>
@endsection