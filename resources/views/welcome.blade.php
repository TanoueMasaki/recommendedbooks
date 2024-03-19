<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
    <head>
    <meta name="robots" content="noindex,nofollow,noarchive" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=yes">
		<meta charset="utf-8">
        <!-- {{asset('パス')}}が必要 -->
		<link rel="stylesheet" href="{{ asset('/css/reset.css')  }}">
		<link rel="stylesheet" href="{{ asset('/css/welcome.css')  }}">
		<!-- <script src="js/functions.js"></script> -->
		<title>masaki,s portfolio</title>
        
    </head>
    <body>
        <header >
            @if (Route::has('login'))
                <div class='loginHeader'>
                    @auth
                        <a href="{{ url('/dashboard') }}" >{{ Auth::user()->name }}'s dashboard</a>
                    @else
                        <a href="{{ route('login') }}" >ログイン</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" >登録</a>
                        @endif
                    @endauth
                </div>
            @endif
        </header>
        <main>
            <img id="topImg" src="{{ asset('/data/image/hondana.png') }}" alt="topImg">
            <h1>Rcommended Books</h1>
            <h2>おすすめ書籍の登録・閲覧アプリ</h2>
            @if (Route::has('login'))
                <div class='loginMain'>
                    @auth
                        <a href="{{ url('/dashboard') }}" >{{ Auth::user()->name }}さんこんにちは<br>ダッシュボードはこちらです</a>
                    @else
                        <a href="{{ route('login') }}" >ログイン</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" >登録</a>
                        @endif
                    @endauth
                </div>
            @endif
            <p>Laravel Breezeを使用したサンプルアプリです</p>
            <p>学習用に作成しているものですので至らない点はご容赦下さい</p>
        </main>

        <footer>
            <div >
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </footer>
    </body>
</html>
