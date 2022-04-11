
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
        </div>
    </header>
