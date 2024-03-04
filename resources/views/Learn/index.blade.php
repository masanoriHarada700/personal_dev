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
        <form action="{{ route('record_study') }}" method="POST" id="monthForm" class=" w-4/6">
            @csrf
            <div class="custom_selectbox_area">
                <select name="month" id="month-select" class="bg-none customSelectbox">
                    @foreach($months as $monthValue => $monthName)
                        <option value="{{ $monthValue }}" {{ $monthValue == $yearMonthOfUserAssign ? 'selected' : '' }}>{{ $monthName }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        {{-- <script>debugger;</script> --}}

        <div class="my-4 w-4/6">
            <div class="">
                <div class="my-4 border-2 p-6 items-center">
                    <form action="{{ route('input.item') }}" id="add-item1" method="POST" class="py-4 flex justify-between">
                        @csrf
                        <input type="hidden" name="categoryName" value="{{ $categories['strBackend'] }}">
                        <input type="hidden" name="month" id="selected-month-addItem1" value="">
                        <h2 class="border-b w-1/5 mr-4">{{ $categories['strBackend'] }}</h2>
                        <x-element.button>項目を追加する</x-element.button>
                    </form>
                    <div class="border shadow">
                        <div class="border py-4 px-4 grid grid-cols-4">
                            <h3 class="w-1/4">項目名</h3>
                            <h3 class="w-1/4 col-span-3">学習時間</h3>
                        </div>
                        @foreach($backend as $data)
                        <div class="border py-4 px-4 grid grid-cols-4">
                            <h3 class="w-1/4">{{ $data->learning_item }}</h3>
                            <div class="col-span-3 grid grid-cols-3">
                                {{-- <script>debugger;</script> --}}
                                <form action="{{ route('edit.time') }}" id="edit-time1" method="POST" class="col-span-2 flex justify-between">
                                    @csrf
                                    <input type="hidden" name="categoryName" value="{{ $categories['strBackend'] }}">
                                    <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                    <input type="number" name="learning_time" class="w-1/4" value="{{ $data->learning_time }}">
                                    <input type="hidden" name="month" id="selected-month-editTime1" value="">
                                    <x-element.save-button>学習時間を保存する</x-element.save-button>
                                </form>
                                <form action="{{ route('delete.item') }}" id="delete-item" method="POST" class="flex justify-end">
                                    @csrf
                                    <input type="hidden" name="categoryName" value="{{ $categories['strBackend'] }}">
                                    <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                    <input type="hidden" name="month" id="selected-month" value="">
                                    <x-element.delete-button>削除する</x-element.delete-button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="my-4 border-2 p-6 items-center">
                        <form action="{{ route('input.item') }}" id="add-item2" method="POST" class="py-4 flex justify-between">
                            @csrf
                            <input type="hidden" name="categoryName" value="{{ $categories['strFrontend'] }}">
                            <input type="hidden" name="month" id="selected-month-addItem2" value="">
                            <h2 class="border-b w-1/5 mr-4">{{ $categories['strFrontend'] }}</h2>
                            <x-element.button>項目を追加する</x-element.button>
                        </form>
                    <div class="border shadow">
                        <div class="border py-4 px-4 flex">
                            <h3 class="w-1/4">項目名</h3>
                            <h3 class="w-1/4 flex-grow">学習時間</h3>
                        </div>
                        @foreach($frontend as $data)
                        <div class="border py-4 px-4 grid grid-cols-4">
                            <h3 class="w-1/4">{{ $data->learning_item }}</h3>
                            <div class="col-span-3 grid grid-cols-3">
                                <form action="{{ route('edit.time') }}" id="edit-time2" method="POST" class="col-span-2 flex justify-between">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <input type="hidden" name="categoryName" value="{{ $categories['strFrontend'] }}">
                                    <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                    <input type="hidden" name="month" id="selected-month-editTime2" value="">
                                    <input type="number" name="learning_time" class="w-1/4" value="{{ $data->learning_time }}">
                                    <x-element.save-button>学習時間を保存する</x-element.save-button>
                                </form>
                                <form action="{{ route('delete.item') }}" id="delete-item" method="POST" class="flex justify-end">
                                    @csrf
                                    <input type="hidden" name="categoryName" value="{{ $categories['strFrontend'] }}">
                                    <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                    <input type="hidden" name="month" id="selected-month" value="">
                                    <x-element.delete-button>削除する</x-element.delete-button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="my-4 border-2 p-6 items-center">
                    <form action="{{ route('input.item') }}" id="add-item3" method="POST" class="py-4 flex justify-between">
                        @csrf
                        <input type="hidden" name="categoryName" value="{{ $categories['strInfrastructure'] }}">
                        <input type="hidden" name="month" id="selected-month-addItem3" value="">
                        <h2 class="border-b w-1/5 mr-4">{{ $categories['strInfrastructure'] }}</h2>
                        <x-element.button>項目を追加する</x-element.button>
                    </form>
                    <div class="border shadow">
                        <div class="border py-4 px-4 flex">
                            <h3 class="w-1/4">項目名</h3>
                            <h3 class="w-1/4 flex-grow">学習時間</h3>
                        </div>
                        @foreach($infrastructure as $data)
                        <div class="border py-4 px-4 grid grid-cols-4">
                            <h3 class="w-1/4">{{ $data->learning_item }}</h3>
                            <div class="col-span-3 grid grid-cols-3">
                                <form action="{{ route('edit.time') }}" id="edit-time3" method="POST" class="col-span-2 flex justify-between">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <input type="hidden" name="categoryName" value="{{ $categories['strInfrastructure'] }}">
                                    <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                    <input type="hidden" name="month" id="selected-month-editTime3" value="">
                                    <input type="number" name="learning_time" class="w-1/4" value="{{ $data->learning_time }}">
                                    <x-element.save-button>学習時間を保存する</x-element.save-button>
                                </form>
                                <form action="{{ route('delete.item') }}" id="delete-item" method="POST" class="flex justify-end">
                                    @csrf
                                    <input type="hidden" name="categoryName" value="{{ $categories['strInfrastructure'] }}">
                                    <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                    <input type="hidden" name="month" id="selected-month" value="">
                                    <x-element.delete-button>削除する</x-element.delete-button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- <script>debugger;</script> --}}
    </main>
    <x-footer></x-footer>
    @if (session('editTime.success'))
        <x-learn.modal :session="session('editTime.success')"></x-learn.modal>
    @endif
    @if (session('delete.success'))
    <x-learn.modal :session="session('delete.success')"></x-learn.modal>
    @endif
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

<script>
    function submitForm(button) {
        // ボタンに紐づくフォームを取得
        var form = button.closest('form');

        // 外部の<h1>の内容を隠しフィールドに設定
        form.month.value = document.getElementById('month-select').value;

        // フォームを送信
        form.submit();
    }
</script>

<script>
    function sendMonthSubmitListener(formId, hiddenFieldId) {
        document.getElementById(formId).addEventListener('submit', function(event) {
            // 選択された月の値を取得
            var selectedMonth = document.getElementById('month-select').value;
            // console.log(selectedMonth);
            // console.log(document.getElementById(formId));
            // 隠しフィールドに値を設定
            document.getElementById(hiddenFieldId).value = selectedMonth;
            // フォームはこの後、自動的に送信されます
        });
    }
    // 各フォームに対してリスナーを設定
    sendMonthSubmitListener('add-item1', 'selected-month-addItem1');
    sendMonthSubmitListener('add-item2', 'selected-month-addItem2');
    sendMonthSubmitListener('add-item3', 'selected-month-addItem3');
</script>

