<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    {{-- favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/imgs/logo.png') }}">

    {{-- link bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    {{-- link google fonts descritiva ROBOTO --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- link google fonts decorativa LOBSTER --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lobster&family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    {{-- link css aplication --}}
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

    @include('Layouts.header')

    <main>
        @yield('content')
    </main>

    @include('Layouts.footer')

    {{-- link jquery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    {{-- link js bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
    </script>
    {{-- link js aplicação --}}
    <script src="{{asset('assets/js/script.js')}}"></script>
</body>

</html>
