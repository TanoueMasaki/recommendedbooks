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
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <table>
		<tr>
			<th>タイトル</th>
            <th>著者</th>
            <th>出版社</th>
            <th>価格</th>
            <th>URL</th>
            <th>コメント</th>
		</tr>
		@foreach($items as $item)
		<tr>
			<td>{{$item->book_name}}</td>
            <td>{{$item->book_author}}</th>
            <td>{{$item->book_publisher}}</th>
            <td>{{$item->book_price}}</th>
            <td>{{$item->book_url}}</th>
            <td>{{$item->comment}}</th>
		</tr>
		@endforeach
	</table>
    
</x-app-layout>
