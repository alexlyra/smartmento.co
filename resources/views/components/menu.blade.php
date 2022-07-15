<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white topnavbar">
        <div class="container-fluid">
            <button class="navbar-toggler smartmentor-dark-blue" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSmartMentor" aria-controls="navbarSmartMentor" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>

            <img src="{{ asset('storage/images/logo.png') }}" class="text-center" width="105" height="50" data-view="small" alt="SmartMentor">

            <div class="loginNavOptionsSmall">
                <a class="smartmentor-dark-blue font-weight-bold" href="#">Login</a>
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
                    <li class="nav-item">
                        <a class="nav-link smartmentor-dark-blue font-weight-bold px-1" href="#">Inscreva-se</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link smartmentor-dark-blue font-weight-bold px-1" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>