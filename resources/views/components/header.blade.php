<header class="w-full h-120 bg-Bitterness-Blue p-10 flex justify-between mx-auto items-center">
        @guest
        <h1 class="text-white text-4xl py-auto font-bold">My Portfolio</h1>
        <form action="{{ route('user.login') }}" method="GET">
            <x-primary-button>ログイン</x-primary-button>
        </form>
        @endguest
        @auth
        <a class="text-white text-4xl font-bold" href="{{ route( 'profilePage.profile' ) }}">My Portfolio</a>
        <form method="post" action="{{ route('logout') }}">
            @csrf
            <x-primary-button onclick="event.preventDefault(); this.closest('form').submit();">ログアウト</x-primary-button>
        </form>
        @endauth
</header>
