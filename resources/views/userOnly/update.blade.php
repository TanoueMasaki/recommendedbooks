<x-app-layout>
    <link rel="stylesheet" href="{{ asset('/css/style_userOnly_update.css')  }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           データの更新
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>以下のレコードを更新します。更新データを入力して実行ボタンを押してください。</p>
                    <p class="red">
                        更新を終了する時は必ず画面下部の「更新を終了する」ボタンを押して下さい<br>
                        （ブラウザの戻るボタンは使用しないで下さい）
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 更新レコードの表示 -->
    
        <!-- main_table -->
        <div class="scroll_table">
            <table class="main_table">
                <thead>
                    <tr>
                        <th class="none"></th>
                        <th class="short">id</th>
                        <th class="long">タイトル</th>
                        <th class="long">著者</th>
                        <th class="long">出版社</th>
                        <th>分類</th>
                        <th>価格</th>
                        <th>URL</th>
                        <th class="long">コメント</th>
                        <th>投稿日</th>
                        <th>投稿時間</th>
                        <th class="long">公開設定</th>
                    </tr>
                </thead>
                </table>
            @foreach($items as $item)
            <table class="main_table">
                <tbody>
                    <tr>
                        <td class="none">現在データ:</td>
                        <td class="short">{{$item->id}}</td>
                        <td class="long">{{$item->book_name}}</td>
                        <td class="long">{{$item->book_author}}</td>
                        <td class="long">{{$item->book_publisher}}</td>
                        <td >{{$item->classification}}</td>
                        <td >{{$item->book_price}}円</td>
                        <!-- URLが未入力なら空白にする -->
                        @if($item->book_url === null)
                            <td></td>
                            @else
                            <td><a href=<?=$item->book_url ?> target="_top">link</a></td>
                        @endif           
                        <td class="long">{{$item->comment}}</td>
                        <td >{{$item->post_date}}</td>
                        <td >{{$item->post_time}}</td>
                        <td class="long">{{$item->publishing_settings}}</td>
                    </tr>
                </tbody>
            </table>
            <!-- input_table -->
            
            <form action="/recommendedbooks/public/userOnly/update" method="post">
                @csrf
                <table class="input_table">
                    <tr>
                        <td class="none">更新データ:</td>
                        <td class="short"><input type="text" name="id" value="{{$item->id}}" hidden></td>
                        <td class="long"><input type="text" name="book_name" value="{{$item->book_name}}" required></td>
                        <td class="long"><input type="text" name="book_author" value="{{$item->book_author}}" required></td>
                        <td class="long"><input type="text" name="book_publisher" value="{{$item->book_publisher}}" required></td>
                        <td>
                            <!-- 分類選択肢 -->
                            <select name="classification" required>
                                @foreach (Config::get('pulldown.pulldown_name') as $key => $val)
                                    @if($item->classification===$key)
                                    <option value="{{ $key }}" selected>{{ $val }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $val }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" min="0" name="book_price" value="{{$item->book_price}}"></td>
                        <td><input type="url" name="book_url" value="{{$item->book_url}}"></td>
                        <td class="long"><input type="text" name="comment" value="{{$item->comment}}"></td>
                        <td></td>
                        <td></td>
                        <td class="long">
                            @if($item->publishing_settings==="private")
                                <input class="radio" type="radio" name="publishing_settings" value="private" required checked>Private
                                <input class="radio" type="radio" name="publishing_settings" value="public" required>Public
                                @else
                                <input class="radio" type="radio" name="publishing_settings" value="private" required>Private
                                <input class="radio" type="radio" name="publishing_settings" value="public" required checked>Public
                            @endif
                        </td>
                    </tr>
                </table>
                <input class="button" type="submit" name="bookDataUpdate" value="実行">
            </form>
            @endforeach
        </div>
        <form action="/laravel/recommendedbooks/public/userOnly/updateEnd" method="post">
        @csrf
        <input class="endButton" type="submit" name="updateEnd" value="更新を終了する">
    </form>
</x-app-layout>
