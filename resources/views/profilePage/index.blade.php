<x-layout title="sign in">
    <x-header></x-header>
    <main class="flex flex-auto flex-col">
        <h1 class="py-10 text-2xl flex justify-center">新規登録</h1>
        <div class="flex-1 flex flex-col items-center">
            <form action="{{ route('user.create') }}" method="post" class="w-1/3">
                @csrf
                <div>
                    <p>氏名</p>
                    <div class="mt-1 py-1">
                        <input name="name"
                               class="w-full h-10 border-0 resize-none focus:outline-none border-b border-gray-400"
                               value="{{ old('name') }}">
                        @error('name')
                            <p class="pt-2" style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-8">
                    <p>メールアドレス</p>
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
                <div class="mt-8">
                    <p>パスワード</p>
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
</x-layout>
