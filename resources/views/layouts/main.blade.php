<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Сайт новостей</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css')}}" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


</head>

<body>

    <x-header></x-header>

    <main>

        <section class="py-5 text-center container">
            @yield('header')
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                
                    @yield('content')

            </div>
        </div>


    </main>
    <x-footer></x-footer>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>


</body>

</html>