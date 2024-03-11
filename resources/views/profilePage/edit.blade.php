<x-layout title="edit-profile">
    <x-header></x-header>
    <main class="flex flex-auto flex-col">
        <h1 class="py-10 text-2xl flex justify-center">自己紹介を編集する</h1>
        <div class="flex-1 flex flex-col items-center">
            <form action="{{ route('create.profile') }}" method="post" class="w-1/3" enctype="multipart/form-data">
                @csrf
                <div>
                    <p>自己紹介文</p>
                    <div class="mt-1 py-1">
                        <textarea name="profile_sentence"
                            class="w-full h-28 border-0 resize-none focus:outline-none border-b border-gray-400 "></textarea>
                        @error('profile_sentence')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="my-10">
                    <p class="">アバター画像</p>
                    <label class="block w-1/2 px-5 py-2 my-2 cursor-pointer bg-gray-200 rounded hover:text-white  hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" for="file_upload">
                    <input type="file" class="hidden" id="file_upload" name="image" accept="image/*">ファイルを選択して下さい</label>
                    <span id="image">{{ old('image') }}</span>
                </div>
                <div class="py-10 flex justify-center">
                    <x-element.button>自己紹介を確定する</x-element.button>
                </div>
            </form>
        </div>
    </main>
    <x-footer></x-footer>
</x-layout>
<script>
    // ファイル入力要素を取得
const fileInput = document.getElementById('file_upload');

// ファイル名を表示する要素を取得
const fileNameDisplay = document.getElementById('image');

// ファイル入力の変更をリスンするイベントリスナーを追加
fileInput.addEventListener('change', function() {
  // ユーザーがファイルを選択した場合、そのファイルの名前を取得
  const fileName = fileInput.files.length > 0 ? fileInput.files[0].name : '';

  // ファイル名を表示する要素にファイル名を設定
  fileNameDisplay.textContent = fileName;
});
</script>