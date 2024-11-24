@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')

<div class="container">
    <!-- PAGE TITLE -->
    <div class="row">
        <div class="span12">
            <div class="page-header">
                <a href="{{ route('grammarguideline') }}">
                    <ul class="breadcrumb">
                        <i class="menu-icon fa fa-arrow-left"></i>
                        <li style="color: #0088cc">&nbsp; &nbsp;Quay Lại</li>
                    </ul>
                </a>
                <h3>Bài hướng dẫn học ngữ pháp</h3>
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="row">
        <div class="span9">
            <!-- Blog Post -->
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
            @if (Auth::user() == null)
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
                        <textarea id="cmtgrammarcontent" class="input-xxlarge" rows="4" name="cmtgrammarcontent"></textarea>
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
                        <p style="background-color:powderblue; height:30px" class="input-xxlarge">
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

@section('scripts')
<script type="text/javascript">
    function Binhluan() {
          var xhttp;
         var cmtgrammarcontent = document.forms["formbinhluan"]["cmtgrammarcontent"].value.trim();  // Lấy nội dung bình luận
        var grammarguidelineid = "{{ $grammar->grammarguidelineid }}";  // Lấy grammarguidelineid từ Controller
        if (cmtgrammarcontent !== "") {
          var url = "{{ route('comment') }}";

            // Tạo đối tượng XMLHttpRequest
            if (window.XMLHttpRequest) {
                xhttp = new XMLHttpRequest();
            } else {
                xhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // Khi yêu cầu hoàn tất
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState === 4 ) {
                     if (xhttp.status === 200) {
                            // Thành công: cập nhật danh sách bình luận
                          var data = xhttp.responseText;
                        document.getElementById("listcomment").innerHTML =data;
                        document . forms["formbinhluan"]["cmtgrammarcontent"].value = "";
                        } else {
                            alert("Có lỗi xảy ra: " + xhttp.statusText);
                        }

                }
            };

            // Gửi yêu cầu POST với tham số 'grammarname'
            xhttp.open("POST", url, true);
            xhttp . setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp . setRequestHeader("X-CSRF-TOKEN", document . querySelector('meta[name="csrf-token"]') . getAttribute('content'));
            xhttp.send("grammarguidelineid="+encodeURIComponent(grammarguidelineid)+"&cmtgrammarcontent=" + encodeURIComponent(cmtgrammarcontent));

        } else {
            document.getElementById("searchresult").innerHTML =
                "Quay lại trang chủ bằng cách click vào logo website";
        }
        console.log('ok');
    }
</script>
@endsection
