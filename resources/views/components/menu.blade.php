<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white topnavbar">
        <div class="container-fluid">
            <button class="navbar-toggler smartmentor-dark-blue" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSmartMentor" aria-controls="navbarSmartMentor" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>

            <img src="{{ asset('storage/images/logo.png') }}" class="text-center" width="105" height="50" data-view="small" alt="SmartMentor" onclick="window.location.href= '{{ route('index') }}'">

            <div class="loginNavOptionsSmall">
                @guest
                    <a class="smartmentor-dark-blue font-weight-bold" href="{{ route('login') }}">Login</a>
                @endguest
                @auth
                    <a class="smartmentor-dark-blue font-weight-bold" href="">
                        <div class="dropdown">
                            <a class="dropdown-toggle d-flex align-items-center hidden-arrow smartmentor-dark-blue font-weight-bold" href="#" id="avatarMenu" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                @if (auth()->user()->photo)
                                    <img src="{{ auth()->user()->photo }}" class="img-fluid rounded-circle" style="width: 32px;height: 32px" loading="lazy">
                                @else
                                    <i class="fa-regular fa-circle-user" style="font-size: 32px"></i>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="avatarMenu">
                                <li>
                                    <a class="dropdown-item" href="#" data-user="pending">Minha conta</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                                </li>
                            </ul>
                        </div>
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
                        <li class="nav-item d-flex align-items-center">
                            <div class="dropdown">
                                <a class="dropdown-toggle d-flex align-items-center hidden-arrow smartmentor-dark-blue font-weight-bold" href="#" id="avatarMenu" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->user()->full_name }}
                                    @if (auth()->user()->photo)
                                        <img src="{{ auth()->user()->photo }}" class="img-fluid rounded-circle ms-2" style="width: 32px;height: 32px" loading="lazy">
                                    @else
                                        <i class="fa-regular fa-circle-user ms-2" style="font-size: 32px"></i>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="avatarMenu">
                                    <li>
                                        <a class="dropdown-item" href="#" data-user="pending">Minha conta</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                                    </li>
                                </ul>
                            </div>
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