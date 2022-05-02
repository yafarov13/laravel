<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">

        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container" style="justify-content: left">
            <a href="/" class="navbar-brand d-flex align-items-center">

                <strong class="@if(request()->routeIs('start')) active @endif">Главная</strong>
            </a>
            <a href="{{route('category')}}" class="navbar-brand d-flex align-items-center">

                <strong class="@if(request()->routeIs('category*')) active @endif">Категории новостей</strong>
            </a>
            <a href="{{route('feedback.index')}}" class="navbar-brand d-flex align-items-center">

                <strong class="@if(request()->routeIs('feedback.*')) active @endif">Оставить отзыв</strong>
            </a>
        </div>
        <ul class="navbar-nav ms-auto login-text-block">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end exit-button" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('account.index') }}">
                        Аккаунт
                    </a>


                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Выход') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</header>