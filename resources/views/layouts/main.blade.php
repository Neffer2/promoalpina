<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        .container {
            width: 800px;
            display: flex;
            justify-content: flex-start;
        }
    </style>
    @livewireStyles
</head>
<body>
    @yield('content')
    @livewireScripts
</body>
</html>