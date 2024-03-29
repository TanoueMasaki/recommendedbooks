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
                <th>分類</th>
                <th>価格</th>
                <th>URL</th>
                <th>コメント</th>
                <th>公開設定</th>
            </tr>

            <tr>
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
                <td id="publishing_settings" class="long">
                    <input type="radio" name="publishing_settings" value="private" required>Private
                    <input type="radio" name="publishing_settings" value="public" required>Public
                </td>
            </tr>
        </table>
        <input class="button" type="submit" name="bookDataAdd" value="投稿する">
        <input class="button" type="reset" value="リセット">
    </form>

    @if(session('errorMessage')===null)
    @else
    <p id="errorMessage">{{session('errorMessage')}}</p>
    @endif
    <form action="/laravel/recommendedbooks/public/userOnly/deleteOrUpdate" method="post">
        @csrf
        <div class="scroll_table">
            <table class="main_table">
                <thead>
                    <tr>
                        <th></th>
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
                        <td><input type="checkbox" name="checkedId[]" value=<?=$item->id?> ></td>

                        <!-- 分類ごとにイメージを決定する -->
                        <td class="center">
                            <?php $imageNum; 
                                switch($item->classification){
                                    case "その他":
                                        $imageNum = 0;
                                    break;
                                    case "コミック":
                                        $imageNum = 1;
                                    break;
                                    case "同人誌":
                                        $imageNum = 2;
                                    break;
                                    case "絵本":
                                        $imageNum = 3;
                                    break;
                                    case "女性ファッション誌":
                                        $imageNum = 4;
                                    break;
                                    case "名言集":
                                        $imageNum = 5;
                                    break;
                                    case "音楽誌":
                                        $imageNum = 6;
                                    break;
                                }
                            ?>
                            <img id="image" src=<?=$images[$imageNum]?> alt="image">
                        </td>

                        <td class="middle">{{$item->book_name}}</td>
                        <td class="center">{{$item->book_author}}</td>
                        <td class="middle">{{$item->book_publisher}}</td>
                        <td class="center">{{$item->classification}}</td>
                        <td class="center">{{$item->book_price}}円</td>

                        <!-- URLが未入力なら空白にする -->
                        @if($item->book_url === null)
                            <td></td>
                            @else
                            <td class="center"><a href=<?=$item->book_url ?> target="_top">link</a></td>
                        @endif
                    
                        <td class="middle">{{$item->comment}}</td>
                        <td class="center">{{$item->post_date}}</td>
                        <td class="center">{{$item->post_time}}</td>
                        <td class="center">{{$item->publishing_settings}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <input class="button" type="submit" name="bookDataDelete" value="削除">
        <input class="button" type="submit" name="bookDataUpdate" value="編集">
        <input class="button" type="reset" value="リセット">
    </form>

    

    
</x-app-layout>
