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
                    <p>項目名</p>
                    <div class="mt-2 py-1">
                        <input name="item"
                            class="w-full h-10 border-0 resize-none focus:outline-none border-b border-gray-400"
                            value="{{ old('item') }}">
                    </div>
                    @error('item')
                    <p style="color: red;">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-8">
                    <p>学習時間</p>
                    <div class="mt-1 py-1">
                        <input name="learning_time"
                            class="w-full h-10 border-0 focus:outline-none border-b border-gray-400"
                            placeholder="単位 : 分" value="{{ old('learning_time') }}">
                    </div>
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
