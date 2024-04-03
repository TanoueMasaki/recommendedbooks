<x-app-layout>
    <link rel="stylesheet" href="{{ asset('/css/style_dashboard.css')  }}">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}<br>
                    {{ Auth::user()->name }}さんこんにちは！<br>
                    このページでは全てのユーザーが登録したpublicデータを閲覧することが出来ます。<br>
                    データの登録や修正等はユーザー専用ページで行って下さい。
                </div>
            </div>
        </div>
    </div>
    <table>
        <tr>
            <form action="/laravel/recommendedbooks/public/userOnly" method="post">
                <td>
                    <input class="button" type="submit" name="ascendingOrderTitle" value="昇順">
                    <input class="button" type="submit" name="descendingOrderTitle" value="降順">
                </td>
                <td>
                    <input class="button" type="submit" name="ascendingOrderTitle" value="昇順">
                    <input class="button" type="submit" name="descendingOrderTitle" value="降順">
                </td>
                <td>
                    <input class="button" type="submit" name="ascendingOrderTitle" value="昇順">
                    <input class="button" type="submit" name="descendingOrderTitle" value="降順">
                </td>
                <td>
                    <input class="button" type="submit" name="ascendingOrderTitle" value="昇順">
                    <input class="button" type="submit" name="descendingOrderTitle" value="降順">
                </td>
                <td>
                    <input class="button" type="submit" name="ascendingOrderTitle" value="昇順">
                    <input class="button" type="submit" name="descendingOrderTitle" value="降順">
                </td>
                <td>
                    <input class="button" type="submit" name="ascendingOrderTitle" value="昇順">
                    <input class="button" type="submit" name="descendingOrderTitle" value="降順">
                </td>
                <td>
                    <input class="button" type="submit" name="ascendingOrderTitle" value="昇順">
                    <input class="button" type="submit" name="descendingOrderTitle" value="降順">
                </td>
                <td>
                    <input class="button" type="submit" name="ascendingOrderTitle" value="昇順">
                    <input class="button" type="submit" name="descendingOrderTitle" value="降順">
                </td>
                <td>
                    <input class="button" type="submit" name="ascendingOrderTitle" value="昇順">
                    <input class="button" type="submit" name="descendingOrderTitle" value="降順">
                </td>
            </form>
        </tr>
		<tr>
            <th>投稿者</th>
			<th>タイトル</th>
            <th>著者</th>
            <th>出版社</th>
            <th>価格</th>
            <th>URL</th>
            <th>コメント</th>
            <th>投稿日</th>
            <th>投稿時間</th>
		</tr>
		@foreach($items as $item)
		<tr>
            <td>{{$item->name}}</td>
			<td>{{$item->book_name}}</td>
            <td>{{$item->book_author}}</td>
            <td>{{$item->book_publisher}}</td>
            <td>{{$item->book_price}}円</td>

            <!-- URLが未入力なら空白にする -->
            @if($item->book_url === null)
                <td></td>
                @else
                <td><a href=<?=$item->book_url ?> target="_top">link</a></td>
            @endif
        
            <td>{{$item->comment}}</td>
            <td>{{$item->post_date}}</td>
            <td>{{$item->post_time}}</td>
		</tr>
        @endforeach
	</table>
    <p class="paginate">{{$items->links()}}</p>
    
</x-app-layout>
