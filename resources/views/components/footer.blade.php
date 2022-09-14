<footer {!! $attributes->has('class') ? "class=\"{$attributes->get('class')}\"" : '' !!}>
    <div class="menu">
        <div class="category">
            <a href="{{ route('index') }}" class="mb-3">Home</a>
        </div>
        <div class="category">
            <a href="" class="mb-3">Sobre a Smartmentor</a>
        </div>
        <div class="category">
            <a href="https://wa.link/z2vnf1" class="mb-3">Quero usar o Guru</a>
            <div class="mt-3">
                <a href="{{ route('termos-de-uso') }}" class="d-block" style="font-size: 1em !important">
                    Termos de Uso
                </a>
                <a href="{{ route('politicas-de-privacidade') }}" class="d-block" style="font-size: 1em !important">
                    Política de Privacidade
                </a>
            </div>
        </div>
        <div class="category">
            <a href="https://smartmentor.com.br/test/cadastrar/mentor" class="mb-3">Quero ser Mentor</a>
        </div>
        <div class="category">
            <a href="" class="mb-3">Contato</a>
            <div class="mt-3">
                <a href="https://wa.link/z2vnf1" class="mx-2">
                    <i class="fa-brands fa-whatsapp fa-2x"></i>
                </a>
                <a href="https://www.instagram.com/smartmentorbr/" class="mx-2">
                    <i class="fa-brands fa-instagram fa-2x"></i>
                </a>
            </div>
        </div>
    </div>
    <h6 class="copyright mb-0">
        Smartmentor {{ date('Y') }}
        <i class="fa-regular fa-copyright mx-2 text-white"></i>
        Todos os direitos reservados
    </h6>
</footer>