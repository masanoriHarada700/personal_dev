<x-layout title="sign in">
    <header>
        <div class="px-10 py-20 bg-gray-500 flex justify-end p-4">
            <h1>My Portfolio</h1>
            <x-primary-button>ログイン</x-primary-button>
        </div>
    </header>
    <h1>新規登録</h1>
    <form action="{{ route('user.create') }}" method="post">
        @csrf
        <div>
            <p>氏名</p>
            <div class="mt-1">
                <textarea name="name"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                    placeholder="つぶやきを入力"></textarea>
                @error('name')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <p>メールアドレス</p>
            <div class="mt-1">
                <textarea name="mail_address"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                    placeholder="つぶやきを入力"></textarea>
                @error('mail_address')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <p>パスワード</p>
            <div class="mt-1">
                <textarea name="password"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                    placeholder="つぶやきを入力"></textarea>
                @error('password')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <x-element.button>登録する</x-element.button>
    </form>
    <footer>
        <div class="px-10 py-20 bg-gray-500 flex justify-end p-4">
            <h1>portfolio site</h1>
        </div>
    </footer>

</x-layout>
