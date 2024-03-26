<x-layout title="login">
    <div class="flex flex-col h-screen">
    <header class="w-full h-120 bg-Bitterness-Blue p-10">
        <div class="flex justify-center mx-auto p-2">
            <h1 class="text-white text-4xl">My Portfolio</h1>
        </div>
    </header>
    <main class="w-1/2 mx-auto flex flex-auto flex-col">
        <div class="w-480 mx-auto flex flex-col">
        <h1 class="py-10 text-gray-54 text-2xl flex justify-center">ログイン</h1>
        <div class="flex flex-col items-center">
            <form action="{{ route('login') }}" method="POST" class="w-full">
                @csrf
                @if (session('status'))
                <div class="flex justify-center">
                    <x-alert.error>{{ session('status') }}</x-alert.error>
                </div>
                @endif
                <div class="mt-8">
                    <p class="text-xs text-gray-54">メールアドレス</p>
                    <div class="mt-2 py-1">
                        <input name="email"
                            class="w-full h-10 border-0 resize-none focus:outline-none border-b border-gray-400">
                    </div>
                    @error('email')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-8">
                    <p class="text-xs text-gray-54">パスワード</p>
                    <div class="mt-1 py-1">
                        <input type="password" name="password"
                            class="w-full h-10 border-0 focus:outline-none border-b border-gray-400"
                            placeholder="半角英数字を含む8文字以上で入力してください。" value="">
                    </div>
                    @error('password')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="py-10 flex justify-center">
                    <x-element.button>ログインする</x-element.button>
                </div>
            </form>
            <form action="{{ route('user.register') }}" method="GET">
                <div class="pb-20 flex justify-center">
                    <x-element.button>新規登録する</x-element.button>
                </div>
            </form>
        </div>
    </div>
    </main>
    <x-footer></x-footer>
    </div>
</x-layout>
