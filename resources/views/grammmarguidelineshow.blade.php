<script type="text/javascript">
    function Binhluan() {
        var xhttp;
        var cmtgrammarcontent = document.forms["formbinhluan"]["cmtgrammarcontent"].value;
        var memberid = "{{ session('sessionmemberid') }}"; // Lấy member ID từ session Laravel
        var grammarguidelineid = "{{ $grammar ->grammarguidelineid }}"; // Lấy grammarguidelineid từ Controller

        var url = "/Cmtgrammarcontroller?cmtgrammarcontent=" + cmtgrammarcontent + "&memberid=" + memberid + "&grammarguidelineid=" + grammarguidelineid;

        if (window.XMLHttpRequest) {
            xhttp = new XMLHttpRequest();
        } else {
            xhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4) {
                var data = xhttp.responseText;
                document.getElementById("listcomment").innerHTML = data;
            }
        }

        xhttp.open("POST", url, true);
        xhttp.send();
    }
</script>
</head>
<body>
@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
<!--HEADER ROW-->
@include('includes.header')
<!-- /HEADER ROW -->

<div class="container">
    <!--PAGE TITLE-->
    <div class="row">
        <div class="span12">
            <div class="page-header">
                 <a href="{{route('grammarguideline')}}">
                        <ul class="breadcrumb" >
                                <i class="menu-icon fa fa-arrow-left"></i>
                            <li style="color: #0088cc">&nbsp; &nbsp;Quay Lại</li>
                        </ul><!-- /.breadcrumb -->
                    </a>
                <h3>Bài hướng dẫn học ngữ pháp</h3>
            </div>
        </div>
    </div>
    <!-- /. PAGE TITLE-->

    <div class="row">
        <div class="span9">
            <!--Blog Post-->
            <div class="blog-post">
                <div class="postmetadata">
                    <ul>
                        <li>
                            <i class="icon-calendar"></i>{{ now() }}
                        </li>
                        <li>
                            <i class="icon-comment"></i> <a href="#">{{ $countrow }} bình luận</a>
                        </li>
                    </ul>
                </div>

                <p>
                    {!! nl2br(e($grammar->content)) !!}
                </p>
            </div>

            @if (session('sessionuser') == null)
                <div class="blog-post">
                    <div>
                        <h3>Bình luận</h3>
                        <textarea class="input-xxlarge" rows="4" name="comment" disabled style="color:red">
                            Đăng nhập để bình luận
                        </textarea>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" disabled>Đăng bình luận</button>
                    </div>
                </div>
            @else
                <form name="formbinhluan">
                    <div>
                        <h3>Bình luận</h3>
                        <textarea class="input-xxlarge" rows="4" name="cmtgrammarcontent"></textarea>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" onclick="Binhluan()">Đăng bình luận</button>
                    </div>
                </form>
            @endif

            <div class="reading_description" style="overflow: auto; height: 300px; width:550px;">
                <div id="listcomment">
                    @foreach ($listcommentgrammar as $list)
                        <h4 style="background-color:yellow" class="input-large">{{ $list->name }}</h4>
                        <p style="background-color:powderblue; height:100px" class="input-xxlarge">
                            {{ $list->cmtgrammarcontent }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="span3">
            <div class="side-bar">
                <h3>Danh mục</h3>
                <ul class="nav nav-list">
                    <li><a href="#">Hướng dẫn học ngữ pháp</a></li>
                    <li><a href="#">Hướng dẫn học từ vựng</a></li>
                    <li><a href="#">Làm bài tập phần đọc</a></li>
                    <li><a href="#">Làm bài tập phần nghe</a></li>
                    <li><a href="#">Thi thử toeic</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="para1">
    @include('includes.footer')
</div>
@endsection
