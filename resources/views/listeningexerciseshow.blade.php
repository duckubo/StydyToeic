

@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
    <!-- /HEADER ROW -->

    <div class="container">
        <!--PAGE TITLE-->
        <div class="row">
            <div class="span12">
                <div class="page-header">
                    <h4>
                        Lựa chọn câu trả lời đúng nhất
                    </h4>
                </div>
            </div>
        </div>
        <!-- /. PAGE TITLE-->
        <br/>

        <div class="row">
            <div class="span12">
                <ul class="thumbnails">
                    <li class="span12">
                        <div class="thumbnail">
                            <form name="myform" id="ketqualambtnghe">
                                @foreach($listenexercises as $list)
                                    <p>
                                        Câu {{ $list->num }}. {{ $list->question }}
                                    </p>
                                    <p>
                                        <img src="images/{{ $list->imagename }}" alt="" style="width:250px;height:150px;"/>
                                    </p>
                                    <p>
                                        <audio controls>
                                            <source src="audio/{{ $list->audiogg }}" type="audio/ogg">
                                            <source src="audio/{{ $list->audiomp3 }}" type="audio/mpeg">
                                        </audio>
                                    </p>
                                    <p>
                                        <input type="radio" name="radio" value="A"/>
                                        {{ $list->option1 }}
                                    </p>
                                    <p>
                                        <input type="radio" name="radio" value="B"/>
                                        {{ $list->option2 }}
                                    </p>
                                    <p>
                                        <input type="radio" name="radio" value="C"/>
                                        {{ $list->option3 }}
                                    </p>
                                    <p>
                                        <input type="radio" name="radio" value="D"/>
                                        {{ $list->option4 }}
                                    </p>
                                @endforeach
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!--Pagination-->
        <div class="row">
            <div class="span12">
                <div>
                    @if($currentPage == 1)
                        <a href="#" class="btn btn-info disabled">Prev</a>
                        <input type="button" value="Đáp án" class="btn btn-info" onclick="Xuatketqua()"/>
                        <a href="{{ route('listeningexercise.show', ['pageid' => $currentPage, 'listenexerciseid' => $listenexerciseid]) }}" class="btn btn-info">Làm lại</a>
                        <a href="{{ route('listeningexercise.show', ['pageid' => $currentPage + 1, 'listenexerciseid' => $listenexerciseid]) }}" class="btn btn-info">Next</a>
                    @elseif($currentPage == $maxPageId)
                        <a href="{{ route('listeningexercise.show', ['pageid' => $currentPage - 1, 'listenexerciseid' => $listenexerciseid]) }}" class="btn btn-info">Prev</a>
                        <input type="button" value="Đáp án" class="btn btn-info" onclick="Xuatketqua()"/>
                        <a href="{{ route('listeningexercise.show', ['pageid' => $currentPage, 'listenexerciseid' => $listenexerciseid]) }}" class="btn btn-info">Làm lại</a>
                        <a href="#" class="btn btn-info disabled">Next</a>
                    @else
                        <a href="{{ route('listeningexercise.show', ['pageid' => $currentPage - 1, 'listenexerciseid' => $listenexerciseid]) }}" class="btn btn-info">Prev</a>
                        <input type="button" value="Đáp án" class="btn btn-info" onclick="Xuatketqua()"/>
                        <a href="{{ route('listeningexercise.show', ['pageid' => $currentPage, 'listenexerciseid' => $listenexerciseid]) }}" class="btn btn-info">Làm lại</a>
                        <a href="{{ route('listeningexercise.show', ['pageid' => $currentPage + 1, 'listenexerciseid' => $listenexerciseid]) }}" class="btn btn-info">Next</a>
                    @endif
                </div>
            </div>
        </div>
        <!--/.Pagination-->

    </div>

    <br/>
    <br/>
<div id="para1">
    @include('includes.footer')
</div>
@endsection
@section('scripts')
<script type="text/javascript">
        function Xuatketqua() {
            var xhttp;
            var kq = document.myform.radio.value;

            var url = "/Lambtnghe?kq=" + kq + "&num=" + {{ $currentPage }} + "&listenexerciseid=" + {{ $listenexerciseid }};

            if (window.XMLHttpRequest) {
                xhttp = new XMLHttpRequest();
            }

            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4) {
                    var data = xhttp.responseText;
                    document.getElementById("ketqualambtnghe").innerHTML = data;
                }
            }

            xhttp.open("POST", url, true);
            xhttp.send();
        }
    </script>
@endsection
