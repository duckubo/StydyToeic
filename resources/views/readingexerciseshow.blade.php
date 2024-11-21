

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
                     <a href="{{route('readingexercise')}}">
                        <ul class="breadcrumb" >
                                <i class="menu-icon fa fa-arrow-left"></i>
                            <li style="color: #0088cc">&nbsp; &nbsp;Quay Lại</li>
                        </ul><!-- /.breadcrumb -->
                    </a>
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
                            <form name="myform" id="ketqualambtdoc">
                                @foreach($readingquestions as $list)
                                    <p>
                                         {!! nl2br(e($list->paragraph)) !!}
                                    </p>
                                    <p>
                                        Câu {{ $list->num }}. {{ $list->question }}
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
                        <a href="{{ route('readingexercise.show', ['pageid' => $currentPage, 'readexeriseid' => $readexeriseid]) }}" class="btn btn-info">Làm lại</a>
                        <a href="{{ route('readingexercise.show', ['pageid' => $currentPage + 1, 'readexeriseid' => $readexeriseid]) }}" class="btn btn-info">Next</a>
                    @elseif($currentPage == $maxPageId)
                        <a href="{{ route('readingexercise.show', ['pageid' => $currentPage - 1, 'readexeriseid' => $readexeriseid]) }}" class="btn btn-info">Prev</a>
                        <input type="button" value="Đáp án" class="btn btn-info" onclick="Xuatketqua()"/>
                        <a href="{{ route('readingexercise.show', ['pageid' => $currentPage, 'readexeriseid' => $readexeriseid]) }}" class="btn btn-info">Làm lại</a>
                        <a href="#" class="btn btn-info disabled">Next</a>
                    @else
                        <a href="{{ route('readingexercise.show', ['pageid' => $currentPage - 1, 'readexeriseid' => $readexeriseid]) }}" class="btn btn-info">Prev</a>
                        <input type="button" value="Đáp án" class="btn btn-info" onclick="Xuatketqua()"/>
                        <a href="{{ route('readingexercise.show', ['pageid' => $currentPage, 'readexeriseid' => $readexeriseid]) }}" class="btn btn-info">Làm lại</a>
                        <a href="{{ route('readingexercise.show', ['pageid' => $currentPage + 1, 'readexeriseid' => $readexeriseid]) }}" class="btn btn-info">Next</a>
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
            var num = "{{ $currentPage }}"; // Giá trị động từ Blade
            var readexeriseid = "{{ $readexeriseid }}"; // Giá trị động từ Blade
            var url = "{{ route('resultreading') }}";

            if (window.XMLHttpRequest) {
                xhttp = new XMLHttpRequest();
            }

            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4) {
                    var data = xhttp.responseText;
                    document.getElementById("ketqualambtdoc").innerHTML = data;
                }
            }

            xhttp.open("POST", url, true);
            xhttp . setRequestHeader("X-CSRF-TOKEN", document . querySelector('meta[name="csrf-token"]') . getAttribute('content'));
            xhttp . setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp . send("kq="+encodeURIComponent(kq)+"&num="+encodeURIComponent(num)+"&readexeriseid="+encodeURIComponent(readexeriseid));
        }
    </script>
@endsection
