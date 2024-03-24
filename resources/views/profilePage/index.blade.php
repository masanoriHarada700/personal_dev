<x-layout title="sign in">
    <div class="flex flex-col h-screen">
    <x-header></x-header>
    <main class="w-1/2 mx-auto flex flex-1 overflow-auto">
        <div class="w-480 mx-auto flex flex-col">
            <h1 class="py-14 text-2xl text-center text-gray-75">新規登録</h1>
            <form action="{{ route('user.create') }}" method="post" class="w-full">
                @csrf
                    <p class="text-xs text-gray-54">氏名</p>
                        <input name="name"
                               class="w-full mt-1 py-1 h-10 border-0 border-b border-gray-400"
                               value="{{ old('name') }}">
                        @error('name')
                            <p class="pt-2" style="color: red;">{{ $message }}</p>
                        @enderror
                <div class="mt-16">
                    <p class="text-xs text-gray-54">メールアドレス</p>
                    <div class="mt-2 py-1">
                        <input name="email"
                            class="w-full h-10 border-0 resize-none focus:outline-none border-b border-gray-400"
                            value="{{ old('email') }}">
                        @error('email')
                            <p class="pt-2" style="color: red;">{{ $message }}</p>
                        @enderror
                        @error('Duplication')
                        <p class="pt-2" style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-16">
                    <p class="text-xs text-gray-54">パスワード</p>
                    <div class="mt-1 py-1">
                        <input type="password" name="password"
                            class="w-full h-10 border-0 focus:outline-none border-b border-gray-400"
                            placeholder="半角英数字を含む8文字以上で入力してください。"
                            value="{{ old('password') }}">
                        @error('password')
                            <p class="pt-2" style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="py-10 flex justify-center">
                    <x-element.button>登録する</x-element.button>
                </div>
            </form>
    </div>
    </main>
    <x-footer></x-footer>
    </div>
</x-layout>
