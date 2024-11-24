@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<div class="container">
    <!-- PAGE TITLE -->
    <div class="row">
        <div class="span12">
            <div class="page-header">
                <h3>
                    Danh sách khóa học
                </h3>
            </div>
        </div>
    </div>
    <!-- /. PAGE TITLE -->
        <div class="row fix" style="
            display: grid;
            grid-template-columns: repeat(2,1fr);
            ">
            @foreach($courses as $course)
                <div class="span6">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="{{ asset('images/' . $course->image) }}" class="media-object" alt="" width="200px" height="200px"/>
                        </a>
                        <div class="media-body">
                            <p style="color: red">
                                {{ $course->name }}
                            </p>
                            <p> Giá:
                                {{ $course->price }}
                            </p>
                            <a href="{{ route('course.show',[ 'courseid' => $course->id]) }}" class="btn" type="button">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    <!-- Pagination -->
    <div class="row">
        <div class="col-6">
            <div class="pagination">
                <ul>
                    @if($currentPage == 1)
                        <li class="disabled"><a href="#">Prev</a></li>
                        <li><a href="{{ route('courses', ['pageid' => $currentPage + 1]) }}">Next</a></li>
                    @elseif($currentPage == $maxPageId)
                        <li><a href="{{ route('courses', ['pageid' => $currentPage - 1]) }}">Prev</a></li>
                        <li class="disabled"><a href="#">Next</a></li>
                    @else
                        <li><a href="{{ route('courses', ['pageid' => $currentPage - 1]) }}">Prev</a></li>
                        <li><a href="{{ route('courses', ['pageid' => $currentPage + 1]) }}">Next</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- /. Pagination -->
</div>
<div id="para1">
    @include('includes.footer')
</div>
@endsection
