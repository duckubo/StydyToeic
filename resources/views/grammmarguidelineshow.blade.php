@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')

<div class="container">
    <!-- PAGE TITLE -->
    <div class="row">
        <div class="span12">
            <div class="page-header">
                 <a href="{{route('grammarguideline')}}">
                        <ul class="breadcrumb" >
                                <i class="menu-icon fa fa-arrow-left"></i>
                            <li style="color: #0088cc">&nbsp; &nbsp;{{ __('label.back') }}</li>
                        </ul><!-- /.breadcrumb -->
                    </a>
                <h3>{{ __('label.grammar_learning_guide_article') }}</h3>

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
                            <i class="icon-comment"></i> <a href="#">{{ $countrow }} {{ __('label.comment') }}</a>
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
                        <h3>{{ __('label.comment') }}</h3>
                        <textarea class="input-xxlarge" rows="4" name="comment" disabled style="color:red">
                        {{ __('label.login_to_comment') }}
                        </textarea>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" disabled>{{ __('label.post_comment') }}</button>
                    </div>
                </div>
            @else
                <form name="formbinhluan">
                    <div>
                        <h3>{{ __('label.comment') }}</h3>
                        <textarea class="input-xxlarge" rows="4" name="cmtgrammarcontent"></textarea>

                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" onclick="Binhluan()">{{ __('label.post_comment') }}</button>
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
                <h3>{{ __('label.category') }}</h3>
                <ul class="nav nav-list">
                    <li><a href="#">{{ __('label.grammar_learning_guide') }}</a></li>
                    <li><a href="#">{{ __('label.vocabulary_learning_guide') }}</a></li>
                    <li><a href="#">{{ __('label.reading_exercise') }}</a></li>
                    <li><a href="#">{{ __('label.listening_exercise') }}</a></li>
                    <li><a href="#">{{ __('label.toeic_practice_test') }}</a></li>
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
