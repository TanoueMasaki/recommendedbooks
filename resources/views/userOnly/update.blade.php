<x-app-layout>
    <link rel="stylesheet" href="{{ asset('/css/style_userOnly_index.css')  }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           データの更新
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                以下のレコードを更新します。更新内容を入力して下さい。
                </div>
            </div>
        </div>
    </div>
    
    <!-- 削除レコードの表示 -->
    <div class="scroll_table">
        <table class="main_table">
            <thead>
                <tr>
                    
                    <th></th>
                    <th>タイトル</th>
                    <th>著者</th>
                    <th>出版社</th>
                    <th>分類</th>
                    <th>価格</th>
                    <th>URL</th>
                    <th>コメント</th>
                    <th>投稿日</th>
                    <th>投稿時間</th>
                    <th>公開設定</th>
                </tr>
            </thead>
            @foreach($items as $item)
            <tbody>
                <tr>
                    <td class="center">{{$item->id}}</td>
                    <td class="middle">{{$item->book_name}}</td>
                    <td class="center">{{$item->book_author}}</td>
                    <td class="middle">{{$item->book_publisher}}</td>
                    <td class="center">{{$item->classification}}</td>
                    <td class="center">{{$item->book_price}}円</td>
                    <td class="center"><{{$item->book_url}}></td>             
                    <td class="middle">{{$item->comment}}</td>
                    <td class="center">{{$item->post_date}}</td>
                    <td class="center">{{$item->post_time}}</td>
                    <td class="center">{{$item->publishing_settings}}</td>
                </tr>
                @endforeach
            </tbody>
            <tr>
                <td></td>
                <td class="long"><input class="input" type="text" name="book_name" required></td>
                <td class="short"><input class="input" type="text" name="book_author" required></td>
                <td class="short"><input class="input" type="text" name="book_publisher" required></td>
                <td id="classification" class="short">
                    <!-- 分類選択肢 -->
                    <select name="classification" required>
                        <option value="" hidden></option>
                        <option value="コミック">コミック</option>
                        <option value="絵本">絵本</option>
                        <option value="女性ファッション誌">女性ファッション誌</option>
                        <option value="同人誌">同人誌</option>
                        <option value="名言集">名言集</option>
                        <option value="音楽誌">音楽誌</option>
                        <option value="その他">その他</option>
                    </select>
                </td>
                <td class="short"><input class="input" type="number" min="0" name="book_price"></td>
                <td class="long"><input class="input" type="url" name="book_url"></td>
                <td class="long"><input class="input" type="text" name="comment"></td>
                <td></td>
                <td></td>
                <td id="publishing_settings" class="long">
                    <input type="radio" name="publishing_settings" value="private" required>Private
                    <input type="radio" name="publishing_settings" value="public" required>Public
                </td>
            </tr>
        </table>
    </div> 
    <!-- 削除実行 -->
    
        
    
    <form action="/laravel/recommendedbooks/public/userOnly/update" method="post">
        @csrf
        

        <input class="button" type="submit" name="bookDataRemove" value="更新を実行する">
        
    </form>   
</x-app-layout>
