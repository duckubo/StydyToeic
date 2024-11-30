@foreach ($listcommentgrammar as $comment)
    <h4 style="background-color:yellow" class="input-large">{{ $comment->name }}</h4>
    <p style="background-color:powderblue; height:30px" class="input-xxlarge">
        {{ $comment->cmtgrammarcontent }}
    </p>
@endforeach
