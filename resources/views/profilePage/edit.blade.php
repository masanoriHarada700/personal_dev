<x-layout title="edit-profile">
    <div class="flex flex-col h-screen">
    <x-header></x-header>
    <main class="w-1/2 mx-auto flex flex-auto flex-col">
        <div class="w-480 mx-auto flex flex-col">
        <h1 class="py-14 text-2xl flex justify-center text-gray-75">自己紹介を編集する</h1>
        <div class="flex-1 flex flex-col items-center">
            <form action="{{ route('create.profile') }}" method="post" class="w-full" enctype="multipart/form-data">
                @csrf
                <div>
                    <p class="text-gray-400">自己紹介文</p>
                    <div class="mt-1">
                        <textarea name="profile_sentence"
                            class="w-full h-28 border-0 resize-none focus:outline-none border-b border-gray-400 ">{{ $introduction }}</textarea>
                        @error('profile_sentence')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="text-gray-400 text-sm">50文字以上、200文字以下で入力してください</p>
                </div>
                <div class="my-10">
                    <p class="text-gray-400 text-sm">アバター画像</p>
                    <label class="inline-block px-6 py-2 my-2 cursor-pointer bg-gray-200 rounded hover:text-white  hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" for="file_upload">
                    <input type="file" class="hidden" id="file_upload" name="image" accept="image/*">画像ファイルを添付する</label>
                    <span id="image">{{ old('image') }}</span>
                </div>
                <div class="py-10 flex justify-center">
                    <x-element.button>自己紹介を確定する</x-element.button>
                </div>
            </form>
        </div>
        </div>
    </main>
    <x-footer></x-footer>
    </div>
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