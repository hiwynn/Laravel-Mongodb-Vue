<li class="notifications {{ $notification->unRead() ? 'unread' : '' }}">
    <a href="{{ $notification->unRead() ? '/notifications/'.$notification->id.'?redirect_url=/inbox/'.$notification->data['dialog'] : '/inbox/'.$notification->data['dialog'] }}">
        {{ $notification->data['name'] }}</a>给你发了一条私信
</li>