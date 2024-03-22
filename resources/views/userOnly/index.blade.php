<x-app-layout>
<link rel="stylesheet" href="{{ asset('/css/style_userOnly_index.css')  }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           ユーザー限定ページ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    ここはユーザー限定のスペースです（サンプルページ）
                </div>
            </div>
        </div>
    </div>

    <form action="/laravel/recommendedbooks/public/dashboard" method="post">
        <!-- これいる -->
        {{ csrf_field() }}

        <!-- ログインユーザーのuser idを取得して渡す -->
        <input type="hidden" name="contributor_id" value=<?=Auth::user()->id ?>>

        <p>タイトル:<input type="text" name="book_name"></p>
        <p>著者:<input type="text" name="book_author"></p>
        <p>出版社:<input type="text" name="book_publisher"></p>
        <p>価格:<input type="number" min="0" name="book_price"></p>
        <p>URL:<input type="url" name="book_url"></p>
        <p>コメント:<input type="text" name="comment"></p>
        <input type="radio" name="publishing_settings" value="private">Private
        <input type="radio" name="publishing_settings" value="public">Public
        <input type="submit" name="bookDataAdd" value="投稿する">
    </form>
</x-app-layout>
