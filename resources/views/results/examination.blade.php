@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<div class="container">
    <!--PAGE TITLE-->
    <br/>

    <!-- /. PAGE TITLE-->

    <div class="row">
        <div class="span9">
            <h4>
            {{ __('label.correct_answer') }}
            </h4>
        </div>
        <div class="span3">
            <h4>
            {{ __('label.your_answer') }}
            </h4>
        </div>
        <div class="span9">
            <div class="thumbnail">
                <div class="reading_description" style="overflow: auto; height: 400px">
                    @foreach($listcorrectanswer as $correctAnswer)
                        @if($correctAnswer->imagequestion != '' && $correctAnswer->audiogg != '' && $correctAnswer->audiomp3 != '')
                            <img src="{{asset('images/'. $correctAnswer->imagequestion )}}" alt="" style="width:250px;height:150px;" />
                            <br/><br/>
                            <p>
                                <audio controls>
                                    <source src="{{asset('audio/'. $correctAnswer->audiogg) }}" type="audio/ogg">
                                    <source src="{{asset('audio/'. $correctAnswer->audiomp3) }}" type="audio/mpeg">
                                </audio>
                            </p>

                            @if($correctAnswer->correctanswer == 'A')
                                <p style="color:red">{{ __('label.question') }} {{ $correctAnswer->num }}. {{ __('label.answer_a_correct') }}</p>
                            @elseif($correctAnswer->correctanswer == 'B')
                                <p style="color:red">{{ __('label.question') }} {{ $correctAnswer->num }}. {{ __('label.answer_b_correct') }}</p>
                            @elseif($correctAnswer->correctanswer == 'C')
                                <p style="color:red">{{ __('label.question') }} {{ $correctAnswer->num }}. {{ __('label.answer_c_correct') }}</p>
                            @elseif($correctAnswer->correctanswer == 'D')
                                <p style="color:red">{{ __('label.question') }} {{ $correctAnswer->num }}. {{ __('label.answer_d_correct') }}</p>
                            @endif
                        @elseif($correctAnswer->imagequestion == '' && $correctAnswer->audiogg != '' && $correctAnswer->audiomp3 != '')
                            <br/><br/>
                            <p>
                                <audio controls>
                                    <source src="{{asset('audio/'.  $correctAnswer->audiogg) }}" type="audio/ogg">
                                    <source src="{{asset('audio/'. $correctAnswer->audiomp3) }}" type="audio/mpeg">
                                </audio>
                            </p>

                            @if($correctAnswer->correctanswer == 'A')
                                <p style="color:red">{{ __('label.question') }} {{ $correctAnswer->num }}. {{ __('label.answer_a_correct') }}</p>
                            @elseif($correctAnswer->correctanswer == 'B')
                                <p style="color:red">{{ __('label.question') }} {{ $correctAnswer->num }}.{{ __('label.answer_b_correct') }}</p>
                            @elseif($correctAnswer->correctanswer == 'C')
                                <p style="color:red">{{ __('label.question') }} {{ $correctAnswer->num }}. {{ __('label.answer_c_correct') }}</p>
                            @elseif($correctAnswer->correctanswer == 'D')
                                <p style="color:red">{{ __('label.question') }} {{ $correctAnswer->num }}. {{ __('label.answer_d_correct') }}</p>
                            @endif
                        @elseif($correctAnswer->imagequestion == '' && $correctAnswer->audiogg == '' && $correctAnswer->audiomp3 == '')
                            @if($correctAnswer->correctanswer == 'A')
                                <p>{{ $correctAnswer->num }}.
                                    {!! nl2br(e($correctAnswer->paragraph)) !!}
                                </p>
                                <p>{{ $correctAnswer->question }}</p>
                                <img alt="" src="{{asset('images/check/correct.png')}}"> {{ $correctAnswer->option1 }}
                                <br><br>
                                {{ $correctAnswer->option2 }}
                                <br><br>
                                {{ $correctAnswer->option3 }}
                                <br><br>
                                {{ $correctAnswer->option4 }}
                                <br><br>
                            @elseif($correctAnswer->correctanswer == 'B')
                                <p>{{ $correctAnswer->num }}.
                                     {!! nl2br(e($correctAnswer->paragraph)) !!}
                                </p>
                                <p>{{ $correctAnswer->question }}</p>
                                {{ $correctAnswer->option1 }}
                                <br><br>
                                <img alt="" src="{{asset('images/check/correct.png')}}">{{ $correctAnswer->option2 }}
                                <br><br>
                                {{ $correctAnswer->option3 }}
                                <br><br>
                                {{ $correctAnswer->option4 }}
                                <br><br>
                            @elseif($correctAnswer->correctanswer == 'C')
                                <p>{{ $correctAnswer->num }}.
                                       {!! nl2br(e($correctAnswer->paragraph)) !!}
                                </p>
                                <p>{{ $correctAnswer->question }}</p>
                                {{ $correctAnswer->option1 }}
                                <br><br>
                                {{ $correctAnswer->option2 }}
                                <br><br>
                                <img alt="" src="{{asset('images/check/correct.png')}}">{{ $correctAnswer->option3 }}
                                <br><br>
                                {{ $correctAnswer->option4 }}
                                <br><br>
                            @elseif($correctAnswer->correctanswer == 'D')
                                <p>{{ $correctAnswer->num }}.
                                       {!! nl2br(e($correctAnswer->paragraph)) !!}
                                </p>
                                <p>{{ $correctAnswer->question }}</p>
                                {{ $correctAnswer->option1 }}
                                <br><br>
                                {{ $correctAnswer->option2 }}
                                <br><br>
                                {{ $correctAnswer->option3 }}
                                <br><br>
                                <img alt="" src="{{asset('images/check/correct.png')}}">{{ $correctAnswer->option4 }}
                                <br><br>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="span3">
            <div class="thumbnail">
                <div class="reading_description" style="overflow: auto; height: 400px">
                    @foreach($listansweruser as $list)
                        <div class="span1">
                            {{ $list->getNum() }}.
                        </div>
                        {{ $list->getAnswer() }}
                        <br/>
                    @endforeach
                </div>
            </div>
            <br/>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">{{ __('label.view_results') }}</button>
            <a href="{{ route('examination.show', ['examinationid' => $examinationid]) }}" class="btn btn-primary">{{ __('label.retake') }}</a>
        </div>
    </div>
</div>

<div id="size1">
    @include('includes.footer')
</div>

<!-- start Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ __('label.exam_results') }}</h4>
            </div>
            <div class="modal-body">
                @foreach($ketquathi as $list)
                    <div class="media">
                        <div class="media-body">
                            <h3>{{ __('label.time') }}: {{ $list->created_at }}</h3>
                            <h4>
                                {{ __('label.correct_questions') }}: {{ $list->correctanswernum }}
                                <br/>
                                {{ __('label.correct_listening') }}:  {{ $list->correctanswerlisten }}
                                <br/>
                                {{ __('label.correct_reading') }}: {{ $list->correctanswerread }}
                            </h4>
                        </div>
                    </div>

                    <div class="media">
                        <div class="media-body">
                            <h4>
                            {{ __('label.incorrect_questions') }}: {{ $list->incorrectanswernum }}
                            </h4>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('label.exit') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
@endsection
