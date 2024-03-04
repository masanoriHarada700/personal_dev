@props([
    'session' => []
])

@once
<div x-data="{ Modal : true, imgModalSrc : '' }">
    <div
        @img-modal.window="Modal = false;"
        x-cloak
        x-show="Modal"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform"
        x-transition:enter-end="opacity-100 transform"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform"
        x-transition:leave-end="opacity-0 transform"
        x-on:click.away="ModalSrc = ''"
        class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-75">
        <div class="w-1/2 flex flex-col max-h-full overflow-auto">
            <form action="{{ route('show_study') }}" method="get" class="bg-white p-4  flex flex-col items-center">
                <h1 class="pt-10 w-full text-xl text-black text-center">{!! nl2br(e($session)) !!}</h1>
                <div class="py-10">
                    <x-element.button>編集ページに戻る</x-element.button>
                </div>
            </form>
        </div>
    </div>
</div>
@endonce