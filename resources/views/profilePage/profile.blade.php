<x-layout title="top">
    <x-header></x-header>
    <main class="w-full flex flex-col justify-center items-center flex-grow">
        <div class="w-960">
            <div class="py-10 grid grid-cols-2">
                <div>
                    <div class="w-360 h-360 rounded-full overflow-hidden mx-auto my-auto flex justify-center items-center">
                        @if ($user->profile_image)
                            <img class="object-cover w-full h-full" alt="" src="{{ asset('storage/image/' . $user->profile_image) }}">
                        @else
                            <div class="w-full h-full bg-gray-500"></div>
                        @endif
                    </div>
                    <h2 class="text-lg py-4 flex justify-center">{{ $user->name }}</h2>
                </div>
                <div class="space-y-10 flex flex-auto flex-col">
                    <h1 class="w-1/2 py-4 text-3xl font-bold border-b-2 border-gray-50 text-gray-75">自己紹介</h1>
                    <p class="break-words">{{ $user->introduction }}</p>
                    <form action="{{ route('profile.edit') }}" method="GET">
                        <x-element.button>自己紹介を編集する</x-element.button>
                    </form>
                </div>
            </div>
            <div class="mx-auto w-2/5">
                <h1 class="py-4 border-b-2 border-gray-50 mx-auto text-3xl font-bold text-center text-gray-75">学習チャート</h1>
            </div>
            <form action="{{ route('show_study') }}" method="get" class="pt-10 pb-20 flex justify-center">
                <x-element.button>編集する</x-element.button>
            </form>
            <div class="w-full mb-20">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </main>
    <x-footer></x-footer>
</x-layout>
<script>
    // PHP変数をJSONに変換してJavaScript変数に代入
    var amountTimesByCategoryId = @json($amountTimesByCategoryId);
</script>
