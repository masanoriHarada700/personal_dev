@props([
    'data' => [],
    'index' => 1
])

<div class="relative">
    <div class="triangle-upward"></div>
    <div class="triangle-downward"></div>
    <input type="number" name="learning_time"
        id="learning-time{{ $index }}"
        class="w-40 h-10 rounded-lg text-gray-54 text-sm py-4 focus:outline-none border-gray-400 input-num"
        value="{{ $data->learning_time }}">
</div>