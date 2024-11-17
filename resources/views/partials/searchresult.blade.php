@if(isset($empty) && $empty != null)
    <div class="row">
        <div class="span6">
            <div class="media">
                {!! $empty !!}
            </div>
        </div>
    </div>
@else
    <div class="row">
        @foreach($results as $item)
            <div class="span6">
                <div class="media">
                    <a href="#" class="pull-left">
                        <img src="{{ asset('images/slide/' . $item->grammarimage) }}" class="media-object" alt='' width="128px" height="128px"/>
                    </a>
                    <div class="media-body">
                        <p>
                            {{ $item->grammarname }}
                        </p>
                        <a href="{{ url('Chitietbaihdnguphapforward?mabaihdnguphap=' . $item->grammarguidelineid) }}" class="btn" type="button">Xem bài hướng dẫn</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
