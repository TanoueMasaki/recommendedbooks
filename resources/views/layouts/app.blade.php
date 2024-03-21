<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('/css/reset.css')  }}">
		<link rel="stylesheet" href="{{ asset('/css/style_app.css')  }}">
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            <footer>
                <hr>
                <p>SNSからもお気軽にご連絡下さい</p>
                <p>よければフォローもお願いします</p>
                <ul>
                    <li>
                        <a href="https://x.com/tanoue_m_0612" target="_top"><img src="./data/image/logo-black.png"></a>
                        <a href="https://instagram.com/masakitanoue" target="_top"><img src="./data/image/Instagram.png"></a>
                        <a href="https://www.threads.net/@masakitanoue" target="_top"><img src="./data/image/threads.png"></a>
                    </li>
                </ul>
                <p class="copylight"> &copy; Masaki Tanoue 2023 </p>
            </footer>
        </div>
    </body>
</html>
