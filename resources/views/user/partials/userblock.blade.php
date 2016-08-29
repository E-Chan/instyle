<div class="media">
    <a class="pull-left" href="{{ route('profile.index', ['username' => $user->username]) }}">
        <img height="100px" class="media-object" alt="{{ $user->getUsername() }}" src="{{$user->getAvatarUrl()}}">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $user->username]) }}">{{ $user->getUsername() }}</a></h4>
        @if ($user->location)<p>{{ $user->location}}</p>
        @endif

        @if (Auth::user()->isNot($user))
            @if (Auth::user()->isFollowing($user))
                <a class="btn btn-danger btn-xs" href="">
                <i class="fa fa-eye-slash"></i> Unfollow</a>
            @else
                <a class="btn btn-success btn-xs" href="{{ route('user.follow', $user) }}">
                <i class="fa fa-eye"></i> Follow</a>
            @endif
        @endif
    </div>
</div>