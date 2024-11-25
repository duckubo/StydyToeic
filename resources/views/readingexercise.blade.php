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
                {{ __('label.list_reading_exercises') }}
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
            @foreach($readingexerciseList as $item)
                <div class="span6">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="{{ asset('images/' . $item->readimage) }}" class="media-object" alt="" width="200px" height="200px"/>
                        </a>
                        <div class="media-body">
                            <p>
                                {{ $item->readname }}
                            </p>
                            <a href="{{ route('readingexercise.show',['pageid' => 1, 'readexeriseid' => $item->readexeriseid]) }}" class="btn" type="button">{{ __('label.do_exercise') }}</a>
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
                        <li><a href="{{ route('readingexercise', ['pageid' => $currentPage + 1]) }}">{{ __('label.{{ __('label.prev') }}') }}</a></li>
                    @elseif($currentPage == $maxPageId)
                        <li><a href="{{ route('readingexercise', ['pageid' => $currentPage - 1]) }}">Prev</a></li>
                        <li class="disabled"><a href="#">{{ __('label.{{ __('label.prev') }}') }}</a></li>
                    @else
                        <li><a href="{{ route('readingexercise', ['pageid' => $currentPage - 1]) }}">Prev</a></li>
                        <li><a href="{{ route('readingexercise', ['pageid' => $currentPage + 1]) }}">{{ __('label.{{ __('label.prev') }}') }}</a></li>
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
