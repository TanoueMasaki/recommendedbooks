<x-app-layout>
    <link rel="stylesheet" href="{{ asset('/css/style_userOnly_index.css')  }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           データの削除
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                以下のレコードが削除されます。本当に削除しますか？
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
                    <!-- 分類ごとにイメージを決定する -->
                    <td class="center">
                        <?php 
                            $imageNum; 
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
    <!-- 削除実行 -->
    
        
    
    <form action="/laravel/recommendedbooks/public/userOnly/remove" method="post">
        @csrf
        <input class="button" type="submit" name="bookDataRemove" value="削除を実行する">
    </form>   
</x-app-layout>
