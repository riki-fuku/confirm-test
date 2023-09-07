<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>課題テスト</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    @yield('css')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    @yield('js')
</head>

<body>
    <main>
        @yield('content')
    </main>
</body>

</html>
