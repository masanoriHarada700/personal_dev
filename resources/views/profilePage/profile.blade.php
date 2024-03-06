<x-layout title="top">
    <x-header></x-header>
    <main class="w-full flex flex-col items-center flex-grow justify-center">
        <div class="w-4/6">
            <div class="py-10 grid grid-cols-2">
                <h1 class="py-5 text-red-600">プロフィール画像</h1>
                <div class="space-y-10 flex flex-auto flex-col">
                    <h1 class="w-1/2 py-5 text-3xl font-bold border-b-2">自己紹介</h1>
                    <h2>自分の自己紹介が入ります自分の自己紹介が入ります自分の自己紹介が入ります自分の自己紹介が入ります自分の自己紹介が入ります</h2>
                    <form action="{{ route('input.item') }}" method="POST">
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
