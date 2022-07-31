<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white topnavbar">
        <div class="container-fluid">
            <button class="navbar-toggler smartmentor-dark-blue" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSmartMentor" aria-controls="navbarSmartMentor" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>

            <img src="{{ asset('storage/images/logo.png') }}" class="text-center" width="105" height="50" data-view="small" alt="SmartMentor">

            <div class="loginNavOptionsSmall">
                @guest
                    <a class="smartmentor-dark-blue font-weight-bold" href="{{ route('login') }}">Login</a>
                @endguest
                @auth
                    <a class="smartmentor-dark-blue font-weight-bold" href="">
                        @if (auth()->user()->photo)
                            <img src="{{ auth()->user()->photo }}" class="img-fluid rounded-circle" style="width: 32px;height: 32px">
                        @else
                            <i class="fa-regular fa-circle-user" style="font-size: 32px"></i>
                        @endif
                    </a>
                @endauth
            </div>

            <div class="collapse navbar-collapse mx-md-3" id="navbarSmartMentor">
                <a href="{{ route('index') }}" class="">
                    <img src="{{ asset('storage/images/logo.png') }}" class="logo" alt="SmartMentor" data-view="big">
                </a>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-md-4">
                        <a class="nav-link smartmentor-dark-blue font-weight-bold" href="#">Sobre a Smartmentor</a>
                    </li>
                    <li class="nav-item mx-md-4">
                        <a class="nav-link smartmentor-dark-blue font-weight-bold" href="#">Guru</a>
                    </li>
                    <li class="nav-item mx-md-4">
                        <a class="nav-link smartmentor-dark-blue font-weight-bolder" href="#">Planos</a>
                    </li>
                </ul>
                <ul class="navbar-nav loginNavOptions">
                    @auth
                        <li class="nav-item">
                            <a href="" class="nav-link smartmentor-dark-blue font-weight-bold px-1 d-flex align-items-center">
                                @if (auth()->user()->photo)
                                    <img src="{{ auth()->user()->photo }}" class="img-fluid rounded-circle" style="width: 32px;height: 32px">
                                @else
                                    <i class="fa-regular fa-circle-user" style="font-size: 32px"></i>
                                @endif
                                <span class="ms-2">{{ auth()->user()->full_name }}</span>    
                            </a>    
                        </li>    
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a class="nav-link smartmentor-dark-blue font-weight-bold px-1" href="#">Inscreva-se</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link smartmentor-dark-blue font-weight-bold px-1" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>