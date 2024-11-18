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
                    Danh sách bài tập phần nghe
                </h3>
            </div>
        </div>
    </div>
    <!-- /. PAGE TITLE -->

    @if(session('msgndchudetuvung'))
        <div class="row">
            <div class="span6">
                <div class="media">
                    <p style="color:red">{{ session('msgndchudetuvung') }}</p>
                </div>
            </div>
        </div>
    @else
        <div class="row fix" style="
            display: grid;
            grid-template-columns: repeat(2,1fr);
            ">
            @foreach($listenexerciseList as $item)
                <div class="span6">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="{{ asset('images/' . $item->listenexerciseimage) }}" class="media-object" alt="" width="128px" height="128px"/>
                        </a>
                        <div class="media-body">
                            <p>
                                {{ $item->listenexercisename }}
                            </p>
                            <a href="{{ route('listeningexercise.show',['pageid' => 1, 'listenexerciseid' => $item->listenexerciseid]) }}" class="btn" type="button">Làm bài tập</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <!-- Pagination -->
    <div class="row">
        <div class="col-6">
            <div class="pagination">
                <ul>
                    @if($currentPage == 1)
                        <li class="disabled"><a href="#">Prev</a></li>
                        <li><a href="{{ route('listeningexercise', ['pageid' => $currentPage + 1]) }}">Next</a></li>
                    @elseif($currentPage == $maxPageId)
                        <li><a href="{{ route('listeningexercise', ['pageid' => $currentPage - 1]) }}">Prev</a></li>
                        <li class="disabled"><a href="#">Next</a></li>
                    @else
                        <li><a href="{{ route('listeningexercise', ['pageid' => $currentPage - 1]) }}">Prev</a></li>
                        <li><a href="{{ route('listeningexercise', ['pageid' => $currentPage + 1]) }}">Next</a></li>
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
