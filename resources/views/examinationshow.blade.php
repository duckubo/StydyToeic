@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<link rel="stylesheet" href="{{ asset('Jqueryphantrang/css/style.css') }}">
<script src="{{asset('js/countdown.js')}}"></script>
<script type="text/javascript">
            function auto_submit() {
                document.form.submit();
            }
            function auto_submit1() {
                setTimeout("auto_submit()", 600000);
            }
</script>

    <div class="container" onLoad="auto_submit1();">
        <div class="row">
            <div class="span12">
                 <a href="{{route('examination')}}">
                        <ul class="breadcrumb" >
                                <i class="menu-icon fa fa-arrow-left"></i>
                            <li style="color: #0088cc">&nbsp; &nbsp;{{ __('label.back') }}</li>
                        </ul><!-- /.breadcrumb -->
                    </a>
                <h3>{{ __('label.complete_toeic_test') }}</h3>
                <script>
                    function doneHandler(result) {
                        var year = result.getFullYear();
                        var month = result.getMonth() + 1;
                        var day = result.getDate();
                        var h = result.getHours();
                        var m = result.getMinutes();
                        var s = result.getSeconds();
                        var UTC = result.toString();

                        var output = UTC + "\n";
                        output += "year: " + year + "\n";
                        output += "month: " + month + "\n";
                        output += "day: " + day + "\n";
                        output += "h: " + h + "\n";
                        output += "m: " + m + "\n";
                        output += "s: " + s + "\n";
                    }
                    var myCountdownTest = new Countdown({
                        time: 600,
                        width: 300,
                        height: 50,
                        onComplete: doneHandler
                    });
                </script>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="span8">
                <div id="paginationdemo" class="thumbnail">
                    <div class="reading_description" style="overflow: auto; height: 400px">
                        <div id="p1" class="_current">
                            <h1 class="khoangcach">{{ __('label.click_page_2') }}</h1>
                        </div>

                        @foreach($questions as $item)
                            @if($item->imagequestion && $item->audiogg && $item->audiomp3)
                                <div id="p{{ $item->num + 1 }}" style="display:none;">
                                    <img src="{{ asset('images/' . $item->imagequestion) }}" alt="" style="width:250px;height:150px;">
                                    <br><br>
                                    <p>
                                        <audio controls>
                                            <source src="{{ asset('audio/' . $item->audiomp3) }}" type="audio/mpeg">
                                        </audio>
                                    </p>
                                    <b>Câu {{ $item->num }}. {{ $item->question }}</b>
                                    <p>{{ $item->option1 }}</p>
                                    <p>{{ $item->option2 }}</p>
                                    <p>{{ $item->option3 }}</p>
                                    <p>{{ $item->option4 }}</p>
                                </div>
                            @elseif(!$item->imagequestion && $item->audiogg && $item->audiomp3)
                                <div id="p{{ $item->num + 1 }}" style="display:none;">
                                    <p>
                                        <audio controls>
                                            <source src="{{ asset('audio/' . $item->audiomp3) }}" type="audio/mpeg">
                                        </audio>
                                    </p>
                                    <b>Câu {{ $item->num }}. {{ $item->question }}</b>
                                    <p>{{ $item->option1 }}</p>
                                    <p>{{ $item->option2 }}</p>
                                    <p>{{ $item->option3 }}</p>
                                    <p>{{ $item->option4 }}</p>
                                </div>
                            @else
                                <div id="p{{ $item->num + 1 }}" style="display:none;">
                                    <p> {!! nl2br(e($item->paragraph)) !!}</p>
                                    <b>Câu {{ $item->num }}. {{ $item->question }}</b>
                                    <p>{{ $item->option1 }}</p>
                                    <p>{{ $item->option2 }}</p>
                                    <p>{{ $item->option3 }}</p>
                                    <p>{{ $item->option4 }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <br>
                <div id="demo5"></div>
            </div>

            <form name="form" action="{{ route('examination.result', ['examinationid' => $examinationid, 'memberid' => $memberid]) }}" method="POST">
                @csrf
                <div class="span4">
                    <div class="thumbnail">
                        <div class="reading_description" style="overflow: auto; height: 400px">
                            @foreach($questions as $item)
                                <div class="span1">{{ $item->num }}.</div>
                                A. <input type="radio" name="ans[{{ $item->num }}]" value="A">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                B. <input type="radio" name="ans[{{ $item->num }}]" value="B">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                C. <input type="radio" name="ans[{{ $item->num }}]" value="C">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                D. <input type="radio" name="ans[{{ $item->num }}]" value="D">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <br><br>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="{{ __('label.submit') }}">
                </div>
            </form>
        </div>
    </div>
<div id="para1">
    @include('includes.footer')
</div>

 <script type="text/javascript" src="{{ asset('Jqueryphantrang/jquery-1.3.2.js') }}"></script>
    <script  type="text/javascript" src="{{ asset('Jqueryphantrang/jquery.paginate.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $("#demo5").paginate({
                count: 11,
                start: 1,
                display: 5,
                border: true,
                border_color: '#fff',
                text_color: '#fff',
                background_color: 'black',
                border_hover_color: '#ccc',
                text_hover_color: '#000',
                background_hover_color: '#fff',
                images: false,
                mouse: 'press',
                onChange: function(page) {
                    $('._current', '#paginationdemo').removeClass('_current').hide();
                    $('#p' + page).addClass('_current').show();
                }
            });
        });
    </script>
@endsection
