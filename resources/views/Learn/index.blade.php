@php
use Carbon\Carbon;

// 現在の月、先月、先々月を取得
$months = [
    Carbon::now()->format('Y-m') => Carbon::now()->format('n月'),
    Carbon::now()->subMonth(1)->format('Y-m') => Carbon::now()->subMonth(1)->format('n月'),
    Carbon::now()->subMonth(2)->format('Y-m') => Carbon::now()->subMonth(2)->format('n月'),
];
$count = 0;
@endphp

<script>
    function checkNonNegative(count) {

        var learningTime = document.getElementById("learning-time" + count).value;
        var saveButton = document.getElementById("save-button" + count);
        console.log(learningTime);
        if (Math.sign(learningTime) === -1 ){
            saveButton.disabled = true;

            saveButton.classList.toggle('bg-white', false);
            saveButton.classList.toggle('hover:bg-blue-600', false);
            saveButton.classList.toggle('bg-gray-400', true);

        } else {
            saveButton.disabled = false;

            saveButton.classList.toggle('bg-gray-400', false);
            saveButton.classList.toggle('hover:bg-blue-600', true);
            saveButton.classList.toggle('bg-white', true);

        }
    }
</script>

<x-layout title="study">
    <x-header></x-header>
    <main class="py-5 flex flex-col items-center flex-grow">
        <form action="{{ route('record_study') }}" method="POST" id="monthForm" class="w-4/6">
            @csrf
            <div class="w-24 h-11  relative text-2xl font-bold text-black mt-5">
                <select name="month" id="month-select" class="bg-none border rounded border-gray-300">
                    @foreach($months as $monthValue => $monthName)
                        <option value="{{ $monthValue }}" {{ $monthValue == $yearMonthOfUserAssign ? 'selected' : '' }}>{{ $monthName }}</option>
                    @endforeach
                </select>
                <div class="equilateral-triangle-downward bg-black"></div>
            </div>
        </form>

        <div class="my-10 w-4/6">
                <div class="border-2 p-10 mb-8 rounded-lg items-center">
                    <form action="{{ route('input.item') }}" id="add-item1" method="POST" class="pb-9 flex justify-between items-center">
                        @csrf
                        <input type="hidden" name="categoryName" value="{{ $categories['strBackend'] }}">
                        <input type="hidden" name="month" id="selected-month-addItem1" value="">
                        <h2 class="border-b-2 h-full font-bold text-gray-75 text-2xl border-gray-50 w-1/5 pb-2 mr-4">{{ $categories['strBackend'] }}</h2>
                        <x-element.button>項目を追加する</x-element.button>
                    </form>
                    <div class="border shadow rounded">
                        <div class="border-b py-4 grid grid-cols-4">
                            <h3 class="w-56 pl-10 text-sm gray-87">項目名</h3>
                            <h3 class="w-56 col-span-3 text-sm gray-87">学習時間</h3>
                        </div>
                        <div class="indi-learning-data">
                            @foreach($backend as $data)
                            <div class="py-4 border-b grid grid-cols-4">
                                <h3 class="w-56 my-auto pl-10 text-sm gray-87">{{ $data->learning_item }}</h3>
                                <div class=" col-span-3 flex justify-between">
                                    {{-- <script>debugger;</script> --}}
                                    <x-learn.input-number :data="$data" :index="$count + $loop->iteration"/>
                                    <form action="{{ route('edit.time') }}" id="edit-time{{ $count + $loop->iteration }}" method="POST" class="my-auto">
                                        @csrf
                                        <input type="hidden" name="categoryName" value="{{ $categories['strBackend'] }}">
                                        <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                        <input type="hidden" name="month" id="selected-month-editTime{{ $count + $loop->iteration }}" value="">
                                        <input type="hidden" name="learning_time" id="learning-time-hidden{{ $count + $loop->iteration }}" value="">
                                        <x-element.save-button :index="$count + $loop->iteration">学習時間を保存する</x-element.save-button>
                                    </form>
                                    <form action="{{ route('delete.item') }}" id="delete-item{{ $count + $loop->iteration }}" method="POST" class="pr-10 my-auto">
                                        @csrf
                                        <input type="hidden" name="categoryName" value="{{ $categories['strBackend'] }}">
                                        <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                        <input type="hidden" name="month" id="selected-month-delete{{ $count + $loop->iteration }}" value="">
                                        <x-element.delete-button :index="$count + $loop->iteration">削除する</x-element.delete-button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @php
                            $count = count($backend);
                        @endphp
                    </div>
                </div>
                <div class="border-2 p-10 mb-8 rounded-lg items-center">
                        <form action="{{ route('input.item') }}" id="add-item2" method="POST" class="pb-9 flex justify-between items-center">
                            @csrf
                            <input type="hidden" name="categoryName" value="{{ $categories['strFrontend'] }}">
                            <input type="hidden" name="month" id="selected-month-addItem2" value="">
                            <h2 class="border-b-2 h-full font-bold text-gray-75 text-2xl border-gray-50 w-1/5 pb-2 mr-4">{{ $categories['strFrontend'] }}</h2>
                            <x-element.button>項目を追加する</x-element.button>
                        </form>
                    <div class="border shadow rounded">
                        <div class="border-b py-4 grid grid-cols-4">
                            <h3 class="w-56 pl-10 text-sm gray-87">項目名</h3>
                            <h3 class="w-56 col-span-3 text-sm gray-87">学習時間</h3>
                        </div>
                        <div class="indi-learning-data">
                            @foreach($frontend as $data)
                            <div class="py-4 border-b grid grid-cols-4">
                                <h3 class="w-56 my-auto pl-10 text-sm gray-87">{{ $data->learning_item }}</h3>
                                <div class="col-span-3 flex justify-between">
                                    {{-- <script>debugger;</script> --}}
                                    <x-learn.input-number :data="$data" :index="$count + $loop->iteration"/>
                                    <form action="{{ route('edit.time') }}" id="edit-time{{ $count + $loop->iteration}}" method="POST" class="my-auto">
                                        @csrf
                                        <input type="hidden" name="categoryName" value="{{ $categories['strFrontend'] }}">
                                        <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                        <input type="hidden" name="month" id="selected-month-editTime{{ $count + $loop->iteration}}" value="">
                                        <input type="hidden" name="learning_time" id="learning-time-hidden{{ $count + $loop->iteration}}" value="">
                                        <x-element.save-button :index="$count + $loop->iteration">学習時間を保存する</x-element.save-button>
                                    </form>
                                    <form action="{{ route('delete.item') }}" id="delete-item{{ $count + $loop->iteration }}" method="POST" class="pr-10 my-auto">
                                        @csrf
                                        <input type="hidden" name="categoryName" value="{{ $categories['strFrontend'] }}">
                                        <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                        <input type="hidden" name="month" id="selected-month-delete{{ $count + $loop->iteration }}" value="">
                                        <x-element.delete-button :index="$count + $loop->iteration">削除する</x-element.delete-button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @php
                            $count += count($frontend);
                        @endphp
                    </div>
                </div>
                <div class="border-2 p-10 mb-8 rounded-lg items-center">
                    <form action="{{ route('input.item') }}" id="add-item3" method="POST" class="pb-9 flex justify-between items-center">
                        @csrf
                        <input type="hidden" name="categoryName" value="{{ $categories['strInfrastructure'] }}">
                        <input type="hidden" name="month" id="selected-month-addItem3" value="">
                        <h2 class="border-b-2 h-full font-bold text-gray-75 text-2xl border-gray-50 w-1/5 pb-2 mr-4">{{ $categories['strInfrastructure'] }}</h2>
                        <x-element.button>項目を追加する</x-element.button>
                    </form>
                    <div class="border shadow rounded">
                        <div class="border-b py-4 grid grid-cols-4">
                            <h3 class="w-56 pl-10 text-sm gray-87">項目名</h3>
                            <h3 class="w-56 col-span-3 text-sm gray-87">学習時間</h3>
                        </div>
                        <div class="indi-learning-data">
                                @foreach($infrastructure as $data)
                                <div class="border-b py-4 grid grid-cols-4">
                                    <h3 class="w-56 my-auto pl-10 text-sm gray-87">{{ $data->learning_item }}</h3>
                                    <div class="col-span-3 flex justify-between">
                                        {{-- <script>debugger;</script> --}}
                                        <x-learn.input-number :data="$data" :index="$count + $loop->iteration"/>
                                            <form action="{{ route('edit.time') }}" id="edit-time{{ $count + $loop->iteration}}" method="POST" class="my-auto">
                                                @csrf
                                                <input type="hidden" name="categoryName" value="{{ $categories['strInfrastructure'] }}">
                                                <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                                <input type="hidden" name="month" id="selected-month-editTime{{ $count + $loop->iteration}}" value="">
                                                <input type="hidden" name="learning_time" id="learning-time-hidden{{ $count + $loop->iteration}}" value="">
                                                <x-element.save-button :index="$count + $loop->iteration">学習時間を保存する</x-element.save-button>
                                            </form>
                                            <form action="{{ route('delete.item') }}" id="delete-item{{ $count + $loop->iteration }}" method="POST" class="pr-10 my-auto">
                                                @csrf
                                                <input type="hidden" name="categoryName" value="{{ $categories['strInfrastructure'] }}">
                                                <input type="hidden" name="itemName" value="{{ $data->learning_item }}">
                                                <input type="hidden" name="month" id="selected-month-delete{{ $count + $loop->iteration }}" value="">
                                                <x-element.delete-button :index="$count + $loop->iteration">削除する</x-element.delete-button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                    </div>
                </div>
        </div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></>
<script>
$(document).ready(function(){
    $('#month-select').change(function(){
        $('#monthForm').submit();
    });
});
</script>

<script>
    function submitForm_editTime(count) {
        var learningTimeValue = document.getElementById('learning-time' + count).value;
        document.getElementById('learning-time-hidden' + count).value = learningTimeValue;
        document.getElementById('selected-month-editTime' + count).value  = document.getElementById('month-select').value;
        document.getElementById('edit-time' + count).submit();
    }
</script>

<script>
    function submitForm_deleteItem(count) {
        document.getElementById('selected-month-delete' + count).value  = document.getElementById('month-select').value;
        document.getElementById('delete-item' + count).submit();
    }
</script>

<script>
    function sendMonthSubmitListener(formId, hiddenFieldId) {
        document.getElementById(formId).addEventListener('submit', function(event) {
            var selectedMonth = document.getElementById('month-select').value;
            document.getElementById(hiddenFieldId).value = selectedMonth;
        });
    }
    sendMonthSubmitListener('add-item1', 'selected-month-addItem1');
    sendMonthSubmitListener('add-item2', 'selected-month-addItem2');
    sendMonthSubmitListener('add-item3', 'selected-month-addItem3');
</script>



