@foreach($dapandungbtdoc as $listcorrectanswer)
    @if($listcorrectanswer->correctanswer == 'A')
        @if($kq == 'A')
            <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'B')
            <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'C')
            <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'D')
            <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option4 }}</p>
        @endif
    @elseif($listcorrectanswer->correctanswer == 'B')
        @if($kq == 'A')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'B')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>{{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'C')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>{{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'D')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>{{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option4 }}</p>
        @endif
    @elseif($listcorrectanswer->correctanswer == 'C')
        @if($kq == 'A')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'B')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>{{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'C')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'D')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option4 }}</p>
        @endif
    @elseif($listcorrectanswer->correctanswer == 'D')
        @if($kq == 'A')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"/> {{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p>
    <img alt="" src="{{ asset('images/check/correct.png') }}" />
    {{ $listcorrectanswer->option4 }}
</p>

        @elseif($kq == 'B')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>{{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'C')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}"> {{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option4 }}</p>
        @elseif($kq == 'D')
        <p>{!! nl2br(e($listcorrectanswer->paragraph)) !!}</p>
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option4 }}</p>
        @endif
    @endif
@endforeach
