@props([
    'index' => 1
])

<button
        type="button"
        onclick="submitForm({{ $index }})"
        class="w-3/8 h-8 leading-4 mx-auto my-auto py-2 px-4 border border-Bitterness-Blue shadow-sm text-sm font-medium rounded text-Bitterness-Blue bg-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
    {{ $slot }}
</button>