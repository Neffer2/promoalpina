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

        .form-group {
            display: flex;
            flex-direction: column;
            margin: 10px;
        }
    </style>
    @livewireStyles
</head> 
<body>
    @if (session('success'))
    <ol>
        <li style="color: yellowgreen;">{{ session('success') }}</li>
    </ol>
    @endif
    @if ($errors->any())
        <ol>
            @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ol>
    @endif
    @yield('content')
    <br><br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button>Salir</button>
    </form>
    @livewireScripts
</body>
</html> 