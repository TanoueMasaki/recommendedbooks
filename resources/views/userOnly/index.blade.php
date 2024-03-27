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

    <form action="/laravel/recommendedbooks/public/userOnly" method="post">
        <!-- これいる -->
        <!-- {{ csrf_field() }} -->
        @csrf
        
        <!-- ログインユーザーのuser idを取得して渡す(hiddenで表示はしない) -->
        <input type="hidden" name="contributor_id" value=<?=Auth::user()->id ?>>
        <table class="input_table">
            <tr>
                <th>タイトル</th>
                <th>著者</th>
                <th>出版社</th>
                <th>価格</th>
                <th>URL</th>
                <th>コメント</th>
                <th>公開設定</th>
            </tr>

            <tr>
                <td><input class="input" type="text" name="book_name" required></td>
                <td><input class="input" type="text" name="book_author" required></td>
                <td><input class="input" type="text" name="book_publisher" required></td>
                <td><input class="input" type="number" min="0" name="book_price"></td>
                <td><input class="input" type="url" name="book_url"></td>
                <td><input class="input" type="text" name="comment"></td>
                <td>
                    <input type="radio" name="publishing_settings" value="private" required>Private
                    <input type="radio" name="publishing_settings" value="public" required>Public
                </td>
            </tr>
        </table>
        <input class="button" type="submit" name="bookDataAdd" value="投稿する">
        <input class="button" type="reset" value="リセット">
    </form>
    <div class="scroll_table">
        <table class="main_table">
            <tr>
                <th>タイトル</th>
                <th>著者</th>
                <th>出版社</th>
                <th>価格</th>
                <th>URL</th>
                <th>コメント</th>
                <th>投稿日</th>
                <th>投稿時間</th>
                <th>公開設定</th>
            </tr>
            @foreach($items as $item)
            <tbody>
                <tr>
                    <td>{{$item->book_name}}</td>
                    <td class="center">{{$item->book_author}}</td>
                    <td>{{$item->book_publisher}}</td>
                    <td class="center">{{$item->book_price}}円</td>

                    <!-- URLが未入力なら空白にする -->
                    @if($item->book_url === null)
                        <td></td>
                        @else
                        <td class="center"><a href=<?=$item->book_url ?> target="_top">link</a></td>
                    @endif
                
                    <td>{{$item->comment}}</td>
                    <td class="center">{{$item->post_date}}</td>
                    <td class="center">{{$item->post_time}}</td>
                    <td class="center">{{$item->publishing_settings}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
