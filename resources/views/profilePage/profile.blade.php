<x-layout title="top">
    <x-header></x-header>
    <main class="w-full flex flex-col items-center flex-grow justify-center">
        <div class="w-4/6">
            <div class="py-10 grid grid-cols-2">
                <div>
                    <div class="w-64 h-64 rounded-full overflow-hidden mx-auto my-auto flex justify-center items-center">
                        @if ($user->profile_image)
                            <img class="object-cover w-full h-full" alt="" src="{{ asset('storage/image/' . $user->profile_image) }}">
                        @else
                            <div class="w-full h-full bg-gray-500"></div>
                        @endif
                    </div>
                    <h2 class="text-lg py-4 flex justify-center">{{ $user->name }}</h2>
                </div>
                <div class="space-y-10 flex flex-auto flex-col">
                    <h1 class="w-1/2 py-5 text-3xl font-bold border-b-2">自己紹介</h1>
                    <p class="break-words">{{ $user->introduction }}</p>
                    <form action="{{ route('profile.edit') }}" method="GET">
                        <x-element.button>自己紹介を編集する</x-element.button>
                    </form>
                </div>
            </div>
            <div class="mx-auto w-2/5">
                <h1 class="py-5 border-b-2 mx-auto text-3xl font-bold text-center ">学習チャート</h1>
            </div>
            <form action="{{ route('show_study') }}" method="get" class="py-10 flex justify-center">
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
