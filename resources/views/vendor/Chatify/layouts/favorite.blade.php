<div class="favorite-list-item">
    @if($user)
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            style="background-image: url('{{ Chatify::getUserWithAvatar($user)->avatar }}');">
        </div>
        <p>{{ $user->name ? (mb_strlen($user->name) > 5 ? mb_substr($user->name, 0, 6) . '..' : $user->name) : 'N/A' }}</p>
    @endif
</div>