@php
use Carbon\Carbon;

// 現在の月、先月、先々月を取得
$months = [
    Carbon::now()->format('Y-m') => Carbon::now()->format('n 月'),
    Carbon::now()->subMonth(1)->format('Y-m') => Carbon::now()->subMonth(1)->format('n 月'),
    Carbon::now()->subMonth(2)->format('Y-m') => Carbon::now()->subMonth(2)->format('n 月'),
];
@endphp
<x-layout title="study">
    <x-header></x-header>
    <main class="py-5 flex flex-col items-center flex-grow">
        <form action="{{ route('record_study') }}" method="GET" id="monthForm" class=" w-4/6">
            @csrf
            <div class="custom_selectbox_area">
                <select name="month" id="month-select" class="bg-none customSelectbox">
                    @foreach($months as $monthValue => $monthName)
                        <option value="{{ $monthValue }}" {{ $monthValue == $yearMonthOfUserAssign ? 'selected' : '' }}>{{ $monthName }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <div class="my-4 w-4/6">
            <div class="">
                <div class="my-4 border-2 p-6 items-center">
                    <div class="py-4 flex justify-between">
                        <h2 class="border-b w-1/5 mr-4">バックエンド</h2>
                        <x-element.button>項目を追加する</x-element.button>
                    </div>
                    <div class="border shadow">
                        <div class="border py-4 px-4 flex">
                            <h3 class="w-1/4">項目名</h3>
                            <h3 class="w-1/4 flex-grow">学習時間</h3>
                        </div>
                        @foreach($backend as $data)
                        <div class="border py-4 px-4 flex justify-start">
                            <h3 class="w-1/4">{{ $data->learning_item }}</h3>
                            <div class="flex flex-grow justify-between">
                                <input type="number" class="w-1/6" value="{{ $data->learning_time }}">
                                <x-element.save-button>学習時間を保存する</x-element.save-button>
                                <x-element.delete-button>削除する</x-element.delete-button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="my-4 border-2 p-6 items-center">
                    <div class="py-4 flex justify-between">
                        <h2 class="border-b w-1/5 mr-4">フロントエンド</h2>
                        <x-element.button>項目を追加する</x-element.button>
                    </div>
                    <div class="border shadow">
                        <div class="border py-4 px-4 flex">
                            <h3 class="w-1/4">項目名</h3>
                            <h3 class="w-1/4 flex-grow">学習時間</h3>
                        </div>
                        @foreach($frontend as $data)
                        <div class="border py-4 px-4 flex justify-start">
                            <h3 class="w-1/4">{{ $data->learning_item }}</h3>
                            <div class="flex flex-grow justify-between">
                                <input type="number" class="w-1/6" value="{{ $data->learning_time }}">
                                <x-element.save-button>学習時間を保存する</x-element.save-button>
                                <x-element.delete-button>削除する</x-element.delete-button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="my-4 border-2 p-6 items-center">
                    <div class="py-4 flex justify-between">
                        <h2 class="border-b w-1/5 mr-4">インフラ</h2>
                        <x-element.button>項目を追加する</x-element.button>
                    </div>
                    <div class="border shadow">
                        <div class="border py-4 px-4 flex">
                            <h3 class="w-1/4">項目名</h3>
                            <h3 class="w-1/4 flex-grow">学習時間</h3>
                        </div>
                        @foreach($infrastructure as $data)
                        <div class="border py-4 px-4 flex justify-start">
                            <h3 class="w-1/4">{{ $data->learning_item }}</h3>
                            <div class="flex flex-grow justify-between">
                                <input type="number" class="w-1/6" value="{{ $data->learning_time }}">
                                <x-element.save-button>学習時間を保存する</x-element.save-button>
                                <x-element.delete-button>削除する</x-element.delete-button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-footer></x-footer>
</x-layout>

<!-- jQueryの読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#month-select').change(function(){
        $('#monthForm').submit(); // プルダウンが変更されたらフォームを送信
    });
});
</script>