<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PhoneBook</title>
    <link rel="stylesheet" href=" {{ asset('css/app.css') }}">
</head>
<body>

    <div id="app">
        <Myheader></Myheader>
        <div class="container ">
            <router-view></router-view>
        </div>
        <Myfooter></Myfooter>
    </div>

    <script  src="{{ asset('js/app.js') }}"></script>

</body>
</html>