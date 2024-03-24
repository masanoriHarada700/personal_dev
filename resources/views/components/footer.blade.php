<footer class="bg-Bitterness-Blue">
    <div class="flex justify-center py-2 text-white">
        @auth
        <h1>{{ $authUser->name }}</h1>
        @endauth
        @guest
        <h1>portfolio site</h1>
        @endguest
    </div>
</footer>