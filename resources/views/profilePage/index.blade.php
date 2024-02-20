<x-layout title="sign in">
    <header class="bg-Bitterness-Blue p-4">
        <div class="flex justify-between mx-auto p-2">
            <h1 class="text-white text-xl">My Portfolio</h1>
            <x-primary-button>ログイン</x-primary-button>
        </div>
    </header>
    <main class="flex flex-auto flex-col">
        <h1 class="py-10 text-2xl flex justify-center">新規登録</h1>
        <div class="flex-1 flex flex-col h-screen items-center">
            <form action="{{ route('user.create') }}" method="post" class="w-1/3">
                @csrf
                    <div>
                        <p>氏名</p>
                        <div class="mt-1 py-1">
                            <input name="name" class="w-full h-10 border-0 resize-none focus:outline-none border-b border-gray-400 ">
                            @error('name')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-8">
                        <p>メールアドレス</p>
                        <div class="mt-2 py-1">
                            <input name="mail_address" class="w-full h-10 border-0 resize-none focus:outline-none border-b border-gray-400">
                            @error('mail_address')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-8">
                        <p>パスワード</p>
                        <div class="mt-1 py-1">
                            <input type="password" name="password" class="w-full h-10 border-0 focus:outline-none border-b border-gray-400"
                            placeholder="半角英数字を含む8文字以上で入力してください。" value="">
                            @error('password')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="py-10 flex justify-center">
                        <x-element.button>登録する</x-element.button>
                    </div>

            </form>
        </div>
    </main>
    <footer class="bg-Bitterness-Blue">
        <div class="flex justify-center p-4 text-white">
            <h1>portfolio site</h1>
        </div>
    </footer>
</x-layout>
