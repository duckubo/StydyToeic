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
                <h3> {{ $course->name }}</h3>
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
                <div class="span8">
                    <div class="blog-post">
                        <div class="postmetadata">
                                    <p>Mô tả khóa học:<span> {{ $course->description}}</span></p>
                                    <img src="{{ asset('images/' . $course->image) }}" class="media-object" alt="" width="100%" height="500px"/>
                                    <p>Giá:<span> {{ $course->price}}</span></p>
                                    @if ($is_enroll == 1)
                                        <p>Bạn đã đăng ký khóa học này</p>
                                        <a href="{{ route('lession', ['lessionid'=>1]) }}">Vào học</a>
                                    @else
                                    <form action="{{ route('course.enroll', ['courseid'=> $course->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" name="redirect">Đăng ký ngay</button>
                                    </form>
                                    @endif
                        </div>
                    </div>
                </div>
        <div class="span4">
            <div class="side-bar">
                <h3>Các bài học</h3>
                <ul class="nav nav-list">
                    @foreach ($lessons as $lesson)
                        @if ($is_enroll == 1)
                            <li><a href="{{ route('lession', ['lessionid' => $lesson->id]) }}"> {{ $lesson->title }}</a></li>
                        @else
                            <li><a href="#"> {{ $lesson->title }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>

<div id="para1">
    @include('includes.footer')
</div>
@endsection
