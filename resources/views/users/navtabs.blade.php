<ul class="nav nav-tabs nav-justified mb-4">
    {{-- ホームタブ --}}
    <li class="nav-item">
        <a href="/" class="nav-link {{ Request::routeIs('/') ? 'active' : '' }}">
            Home
        </a>
        <!--Home-->
    </li>
    {{-- プロフィールタブ --}}
    <li class="nav-item">
        {{-- <a href="{{ route('users.show', 'Profile', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.profile') ? 'active' : '' }}">
            Profile
        </a>
        --}}
        Profile
    </li>
    {{-- フォロー一覧タブ --}}
    <li class="nav-item">
        {{--<a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            Follow
        </a>--}}
        Follow
    </li>
    {{-- フォロワ一覧タブ --}}
    <li class="nav-item">
        {{--<a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            Follower
        </a>--}}
        Follwer
    </li>
    {{-- Like一覧タブ --}}
    <li class="nav-item">
        {{--<a href="{{ route('users.likes', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.likes') ? 'active' : '' }}">
            Like
        </a>--}}
        Like
    </li>
</ul>