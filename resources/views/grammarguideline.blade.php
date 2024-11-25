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
                {{ __('label.grammar_topics_list') }}
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
    @else
        <div class="row">
            @foreach($grammarList as $list)
                <div class="span6">
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="{{ asset('images/slide/' . $list->grammarimage) }}" class="media-object" alt='' width="128px" height="128px"/>
                        </a>
                        <div class="media-body">
                            <p>
                                {{ $list->grammarname }}
                            </p>
                            <a href="{{ route('grammarguideline.show', $list->grammarguidelineid) }}" class="btn" type="button">{{ __('label.view_topic_content') }}</a>
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
                        <li class="disabled"><a href="#">{{ __('label.prev') }}</a></li>
                        <li><a href="{{ route('grammarguideline', ['pageid' => $currentPage + 1]) }}">{{ __('label.next') }}</a></li>
                    @elseif($currentPage == $maxPageId)
                        <li><a href="{{ route('grammarguideline', ['pageid' => $currentPage - 1]) }}">{{ __('label.prev') }}</a></li>
                        <li class="disabled"><a href="#">{{ __('label.next') }}</a></li>
                    @else
                        <li><a href="{{ route('grammarguideline', ['pageid' => $currentPage - 1]) }}">{{ __('label.prev') }}</a></li>
                        <li><a href="{{ route('grammarguideline', ['pageid' => $currentPage + 1]) }}">{{ __('label.next') }}</a></li>
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
