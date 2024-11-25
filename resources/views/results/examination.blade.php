@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<div class="container">
    <!--PAGE TITLE-->
    <br/>

    <!-- /. PAGE TITLE-->

    <div class="row">
        <div class="span9">
            <h4>
                Đáp án đúng
            </h4>
        </div>
        <div class="span3">
            <h4>
                Đáp án người dùng
            </h4>
        </div>
        <div class="span9">
            <div class="thumbnail">
                <div class="reading_description" style="overflow: auto; height: 400px">
                    @foreach($listcorrectanswer as $correctAnswer)
                        @if($correctAnswer->imagequestion != '' && $correctAnswer->audiogg != '' && $correctAnswer->audiomp3 != '')
                            <img src="{{asset('images/'. $correctAnswer->imagequestion )}}" alt="" style="width:250px;height:150px;" />
                            <br/><br/>
                            <p>
                                <audio controls>
                                    <source src="{{asset('audio/'. $correctAnswer->audiogg) }}" type="audio/ogg">
                                    <source src="{{asset('audio/'. $correctAnswer->audiomp3) }}" type="audio/mpeg">
                                </audio>
                            </p>

                            @if($correctAnswer->correctanswer == 'A')
                                <p style="color:red">Câu {{ $correctAnswer->num }}. Đáp án A đúng</p>
                            @elseif($correctAnswer->correctanswer == 'B')
                                <p style="color:red">Câu {{ $correctAnswer->num }}. Đáp án B đúng</p>
                            @elseif($correctAnswer->correctanswer == 'C')
                                <p style="color:red">Câu {{ $correctAnswer->num }}. Đáp án C đúng</p>
                            @elseif($correctAnswer->correctanswer == 'D')
                                <p style="color:red">Câu {{ $correctAnswer->num }}. Đáp án D đúng</p>
                            @endif
                        @elseif($correctAnswer->imagequestion == '' && $correctAnswer->audiogg != '' && $correctAnswer->audiomp3 != '')
                            <br/><br/>
                            <p>
                                <audio controls>
                                    <source src="{{asset('audio/'.  $correctAnswer->audiogg) }}" type="audio/ogg">
                                    <source src="{{asset('audio/'. $correctAnswer->audiomp3) }}" type="audio/mpeg">
                                </audio>
                            </p>

                            @if($correctAnswer->correctanswer == 'A')
                                <p style="color:red">Câu {{ $correctAnswer->num }}. Đáp án A đúng</p>
                            @elseif($correctAnswer->correctanswer == 'B')
                                <p style="color:red">Câu {{ $correctAnswer->num }}. Đáp án B đúng</p>
                            @elseif($correctAnswer->correctanswer == 'C')
                                <p style="color:red">Câu {{ $correctAnswer->num }}. Đáp án C đúng</p>
                            @elseif($correctAnswer->correctanswer == 'D')
                                <p style="color:red">Câu {{ $correctAnswer->num }}. Đáp án D đúng</p>
                            @endif
                        @elseif($correctAnswer->imagequestion == '' && $correctAnswer->audiogg == '' && $correctAnswer->audiomp3 == '')
                            @if($correctAnswer->correctanswer == 'A')
                                <p>{{ $correctAnswer->num }}.
                                    {!! nl2br(e($correctAnswer->paragraph)) !!}
                                </p>
                                <p>{{ $correctAnswer->question }}</p>
                                <img alt="" src="{{asset('images/check/correct.png')}}"> {{ $correctAnswer->option1 }}
                                <br><br>
                                {{ $correctAnswer->option2 }}
                                <br><br>
                                {{ $correctAnswer->option3 }}
                                <br><br>
                                {{ $correctAnswer->option4 }}
                                <br><br>
                            @elseif($correctAnswer->correctanswer == 'B')
                                <p>{{ $correctAnswer->num }}.
                                     {!! nl2br(e($correctAnswer->paragraph)) !!}
                                </p>
                                <p>{{ $correctAnswer->question }}</p>
                                {{ $correctAnswer->option1 }}
                                <br><br>
                                <img alt="" src="{{asset('images/check/correct.png')}}">{{ $correctAnswer->option2 }}
                                <br><br>
                                {{ $correctAnswer->option3 }}
                                <br><br>
                                {{ $correctAnswer->option4 }}
                                <br><br>
                            @elseif($correctAnswer->correctanswer == 'C')
                                <p>{{ $correctAnswer->num }}.
                                       {!! nl2br(e($correctAnswer->paragraph)) !!}
                                </p>
                                <p>{{ $correctAnswer->question }}</p>
                                {{ $correctAnswer->option1 }}
                                <br><br>
                                {{ $correctAnswer->option2 }}
                                <br><br>
                                <img alt="" src="{{asset('images/check/correct.png')}}">{{ $correctAnswer->option3 }}
                                <br><br>
                                {{ $correctAnswer->option4 }}
                                <br><br>
                            @elseif($correctAnswer->correctanswer == 'D')
                                <p>{{ $correctAnswer->num }}.
                                       {!! nl2br(e($correctAnswer->paragraph)) !!}
                                </p>
                                <p>{{ $correctAnswer->question }}</p>
                                {{ $correctAnswer->option1 }}
                                <br><br>
                                {{ $correctAnswer->option2 }}
                                <br><br>
                                {{ $correctAnswer->option3 }}
                                <br><br>
                                <img alt="" src="{{asset('images/check/correct.png')}}">{{ $correctAnswer->option4 }}
                                <br><br>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="span3">
            <div class="thumbnail">
                <div class="reading_description" style="overflow: auto; height: 400px">
                    @foreach($listansweruser as $list)
                        <div class="span1">
                            {{ $list->getNum() }}.
                        </div>
                        {{ $list->getAnswer() }}
                        <br/>
                    @endforeach
                </div>
            </div>
            <br/>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Xem kết quả thi</button>
            <a href="{{ route('examination.show', ['examinationid' => $examinationid]) }}" class="btn btn-primary">Làm lại</a>
        </div>
    </div>
</div>

<div id="size1">
    @include('includes.footer')
</div>

<!-- start Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Kết quả thi của người dùng</h4>
            </div>
            <div class="modal-body">
                @foreach($ketquathi as $list)
                <div style="display:flex; column-gap:20px;">
                    <div>
                    <div class="media">
                        <div class="media-body">
                            <h3>Thời gian: {{ $list->created_at }}</h3>
                            <h4>
                                Số câu đúng: {{ $list->correctanswernum }}
                                <br/>
                                - Số câu đúng phần nghe: {{ $list->correctanswerlisten }}
                                <br/>
                                - Số câu đúng phần đọc: {{ $list->correctanswerread }}
                            </h4>
                        </div>
                    </div>

                    <div class="media">
                        <div class="media-body">
                            <h4>
                                Số câu sai: {{ $list->incorrectanswernum }}
                            </h4>
                        </div>
                    </div>

                    </div>

                    <div>
                            <canvas class="myPieChart" width="200" height="200"></canvas>
                    </div>
                     </div>
                    <hr>
                @endforeach
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
            </div>
        </div>
    </div>
</div>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Truyền toàn bộ dữ liệu từ PHP sang JavaScript
    var ketquathi = @json($ketquathi);

    var pieCharts = document.querySelectorAll('.myPieChart');

    pieCharts.forEach(function(canvas, index) {
        var ctx = canvas.getContext('2d'); // Lấy context của mỗi canvas

        // Sử dụng index để lấy dữ liệu từ mảng ketquathi
        var correctAnswerNum = ketquathi[index].correctanswernum;
        var incorrectAnswerNum = ketquathi[index].incorrectanswernum;

        console.log(correctAnswerNum, incorrectAnswerNum);

        var myPieChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: ["True", "False"], // Các nhãn cho các phần
                datasets: [
                    {
                        label: "My First Dataset",
                        data: [correctAnswerNum, incorrectAnswerNum], // Dữ liệu cho các phần của pie chart
                        backgroundColor: ["red", "blue"], // Màu sắc cho mỗi phần
                        hoverOffset: 4,
                    },
                ],
            },
            options: {
                responsive: false, // Đảm bảo biểu đồ phản hồi theo kích thước màn hình
                plugins: {
                    legend: {
                        position: "top",
                    },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return (
                                    tooltipItem.label +
                                    ": " +
                                    tooltipItem.raw
                                );
                            },
                        },
                    },
                },
            },
        });
    });
</script>

<!-- end modal -->
@endsection
