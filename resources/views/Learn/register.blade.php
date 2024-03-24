<x-layout title="create">
    <x-header></x-header>
    <main class="flex flex-auto flex-col">
        <h1 class="py-10 text-2xl flex justify-center">{{ session('categoryName') }}に項目名を追加</h1>
        <div class="flex flex-col items-center">
            <form action="{{ route('create.item') }}" method="post" class="w-1/3">
                @csrf
                @if (session('status'))
                <div class="justify-center">
                    <x-alert.error>{{ session('status') }}</x-alert.error>
                </div>
                @endif
                <div class="mt-8">
                    <p class="text-gray-500">項目名</p>
                    <input name="item"
                        class="w-full text-lg py-1 mt-2 border-0 focus:outline-none border-b border-gray-400"
                        value="{{ old('item') }}">
                    @error('item')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-8">
                    <p class="text-gray-500 mb-2">学習時間</p>
                    <div class="relative">
                        <div class="triangle-upward"></div>
                        <div class="triangle-downward"></div>
                        <input type="number" name="learning_time"
                            class="w-full text-lg py-1 border-0 focus:outline-none border-b border-gray-400 input-num"
                            value="{{ old('learning_time') }}">
                    </div>
                    <h2 class="py-2 text-gray-500">分単位で入力してください</h2>

                    @error('learning_time')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="py-10 flex justify-center">
                    <x-element.button>追加する</x-element.button>
                </div>
            </form>
        </div>
    </main>
    <x-footer></x-footer>
    @if (session('addItem.success'))
        <x-learn.modal :session="session('addItem.success')"></x-learn.modal>
    @endif
</x-layout>
