<header class="bg-Bitterness-Blue p-4">
    <div class="flex justify-between mx-auto p-2">
        <h1 class="text-white text-xl">My Portfolio</h1>
        @guest
        <form action="{{ route('user.login') }}" method="GET">
            <x-primary-button>ログイン</x-primary-button>
        </form>
        @endguest
        @auth
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <x-primary-button onclick="event.preventDefault(); this.closest('form').submit();">ログアウト</x-primary-button>
        </form>
        @endauth
    </div>
</header>
