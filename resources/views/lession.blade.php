@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<div class="container">
    <!-- PAGE TITLE -->
    <!--PAGE TITLE-->
    <div class="row">
        <div class="span12">
            <div class="page-header">
                 <a href="{{route('courses')}}">
                        <ul class="breadcrumb" >
                                <i class="menu-icon fa fa-arrow-left"></i>
                            <li style="color: #0088cc">&nbsp; &nbsp;Quay Lại</li>
                        </ul><!-- /.breadcrumb -->
                    </a>
            </div>
        </div>
    </div>
    <!-- /. PAGE TITLE-->

    <!-- /. PAGE TITLE -->

    @if(session('errorMessage'))
        <div class="row">
            <div class="col-6">
                <div class="media">
                    <p style="color:red">{{ session('errorMessage') }}</p>
                </div>
            </div>
        </div>
    @else
        <div class="row">
                <div class="span12">
                    <div class="blog-post">
                        <div class="postmetadata">
                            <iframe src="https://www.youtube.com/embed/{{ $lession->video }}" width="1200" height="800" sandbox="allow-scripts allow-same-origin" frameborder="0" allowfullscreen></iframe>
                            <p> {{ $lession->title }}</p>
                            <p>Nội dung bài học: <span>{{ $lession->content }}</span></p>
                        </div>
                    </div>
                </div>
                @if ($nextLes != null)
                <a href="{{ route('lession', ['lessionid' => $nextLes->id]) }}">Bài học tiếp theo: {{ $nextLes->title }}</a>
                @endif
        </div>
    @endif
</div>

<div id="para1">
    @include('includes.footer')
</div>
@endsection
