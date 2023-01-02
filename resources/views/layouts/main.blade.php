<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" >
    <title>@yield('title')</title>
    @livewireStyles
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head> 
<body> 
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @yield('content') 
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('logout') }}" method="POST" class="d-flex justify-content-center">
                    @csrf
                    <button>Cerrar sesion</button>
                </form>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html> 