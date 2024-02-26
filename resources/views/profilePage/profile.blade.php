<x-layout title="top">
    <x-header></x-header>
    <main class="pl-10 flex flex-auto flex-col">
        <h1>TOP画面！</h1>
        <h1>ログイン完了！</h1>
        <form action="{{ route('show_study') }}" method="get" class="w-1/3">
            <div class="py-10 flex justify-center">
                <x-element.button>編集する</x-element.button>
            </div>
        </form>
    </main>
    <x-footer></x-footer>
</x-layout>
