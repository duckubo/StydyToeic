@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<div class="container">
    <!-- PAGE TITLE -->
    <div class="row">
        <div class="col-12">
            <div class="page-header">
                <h3>
                   Danh sách đề thi toeic hoàn chỉnh
                </h3>
            </div>
        </div>
    </div>

    <!-- /. PAGE TITLE -->

    @if(session('errorMessage'))
        <div class="row">
            <div class="col-6">
                <div class="media">
                    <p style="color:red">{{ session('errorMessage') }}</p>
                </div>
            </div>
        </div>
    @endif
   <div class="row fix" style="
            display: grid;
            grid-template-columns: repeat(2,1fr);
            ">
        @foreach($examList as $list)
            <div class="span6">
                <div class="media">
                    <a href="#" class="pull-left">
                        <img src="{{ asset('images/' . $list->examinatioimage) }}" class="media-object" alt='' width="200px" height="200px"/>
                    </a>
                    <div class="media-body">
                        <p>
                            {{ $list->examinationame }}
                        </p>
                        <a href="{{ route('examination.show',['examinationid' => $list->examinationid]) }}" class="btn" type="button">Xem nội dung chủ đề</a>
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
                        <li><a href="{{ route('examination', ['pageid' => $currentPage + 1]) }}">Next</a></li>
                    @elseif($currentPage == $maxPageId)
                        <li><a href="{{ route('examination', ['pageid' => $currentPage - 1]) }}">Prev</a></li>
                        <li class="disabled"><a href="#">Next</a></li>
                    @else
                        <li><a href="{{ route('examination', ['pageid' => $currentPage - 1]) }}">Prev</a></li>
                        <li><a href="{{ route('examination', ['pageid' => $currentPage + 1]) }}">Next</a></li>
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
