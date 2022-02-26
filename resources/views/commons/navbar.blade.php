<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">Shokureki</a>

        {{-- ログイン後ハンバーガアイコン表示 --}}
        @if(Auth::check())
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ一覧へのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.index', 'Users') !!}</li>
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.show', 'Profile', ['user' => Auth::id()]) !!}</li>
                            {{-- お気に入り一覧ページへのリンク
                            <li class="dropdown-item">{!! link_to_route('users.favorites', 'Favorites', ['id' => Auth::id()]) !!}</li> --}}
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                </ul>
            </div>
        @endif
    </nav>
</header>