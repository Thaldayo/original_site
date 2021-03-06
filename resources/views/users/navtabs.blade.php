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
        <a href="{{ route('users.profile', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.profile') ? 'active' : '' }}">
            Profile
        </a>
    </li>
    {{-- フォロー一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            Followings
        </a>
    </li>
    {{-- フォロワー一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            Followers
        </a>
    </li>
    {{-- Like一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.likes', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.likes') ? 'active' : '' }}">
            Like
        </a>
    </li>
</ul>