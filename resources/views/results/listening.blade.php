@foreach($dapandungbtnghe as $listcorrectanswer)
    @if($listcorrectanswer->correctanswer == 'A')
        @if($kq == 'A')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>
                <img src="{{ asset('images/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" />
            </p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}"> {{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'B')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>
                <img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" />
            </p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'C')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>
                <img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" />
            </p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'D')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p>
                <img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" />
            </p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option4 }}</p>
        @endif
    @elseif($listcorrectanswer->correctanswer == 'B')
        @if($kq == 'A')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'B')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'C')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'D')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option4 }}</p>
        @endif
    @elseif($listcorrectanswer->correctanswer == 'C')
        @if($kq == 'A')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'B')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'C')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option3 }}</p>
            <p>{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'D')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option4 }}</p>
        @endif
    @elseif($listcorrectanswer->correctanswer == 'D')
        @if($kq == 'A')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'B')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'C')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/correct.png') }}">{{ $listcorrectanswer->option4 }}</p>
        @endif
        @if($kq == 'D')
            <p>{{ $listcorrectanswer->num }}. {{ $listcorrectanswer->question }}</p>
            <p><img src="{{ asset('Filebtphannghe/' . $listcorrectanswer->imagename) }}" alt="" style="width:250px;height:150px;" /></p>
            <p>
                <audio controls>
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiogg) }}" type="audio/ogg">
                    <source src="{{ asset('Filebtphannghe/' . $listcorrectanswer->audiomp3) }}" type="audio/mpeg">
                </audio>
            </p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option1 }}</p>
            <p>{{ $listcorrectanswer->option2 }}</p>
            <p>{{ $listcorrectanswer->option3 }}</p>
            <p><img alt="" src="{{ asset('images/check/incorrect.png') }}">{{ $listcorrectanswer->option4 }}</p>
        @endif
    @endif
@endforeach
