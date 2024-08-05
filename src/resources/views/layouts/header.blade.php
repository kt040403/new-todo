<style>
    nav {
        text-align: right;
        padding: 100px;
    }

    .nav-links div {
        display: inline-block;
        margin-left: 10px;
    }
</style>

<header>
    <nav>
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block nav-links">
            @auth
            <div>
                <a href="{{ route('todo.index') }}" class="text-sm text-gray-700 underline">マイページ</a>
            </div>
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="text-sm text-gray-700 underline">ログアウト</a>
                </form>
            </div>
            @else
            <div>
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">ログイン</a>
            </div>

            @if (Route::has('register'))
            <div>
                <a href="{{ route('register') }}" class="text-sm text-gray-700 underline">新規作成</a>
            </div>
            @endif
            @endauth
        </div>
    </nav>
</header>