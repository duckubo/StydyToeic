@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<div class="container">
    <!-- PAGE TITLE -->
    <div class="row">
        <div class="span12">
            <div class="page-header">
                 <a href="{{route('vocabularyguideline')}}">
                        <ul class="breadcrumb" >
                                <i class="menu-icon fa fa-arrow-left"></i>
                            <li style="color: #0088cc">&nbsp; &nbsp;Quay Lại</li>
                        </ul><!-- /.breadcrumb -->
                    </a>
                <h3>
                    Nội dung chủ đề từ vựng
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
            @foreach($vocabulary as $item)
                <div class="span6">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="{{ asset('images/' . $item->image) }}" class="media-object" alt="" width="128px" height="128px"/>
                        </a>
                        <div class="media-body">
                            <p>
                                Từ: {{ $item->vocabularycontentname }}
                            </p>
                            <p>
                                Phiên âm: {{ $item->transcribe }}
                            </p>
                            <p>
                                Nghĩa và từ loại: {{ $item->mean }}
                            </p>
                            <p>
                                <audio controls>
                                    <source src="{{ asset('audio/' . $item->audiogg) }}" type="audio/ogg">
                                    <source src="{{ asset('audio/' . $item->audiomp3) }}" type="audio/mpeg">
                                </audio>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<div id="para1">
    @include('includes.footer')
</div>
@endsection
