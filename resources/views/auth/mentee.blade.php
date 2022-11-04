@extends('template.app')

@section('content')

<section class="text-center">
        <div class="container my-5">
            <img src="{{ asset('storage/images/guru.png') }}" width="106" height="98" alt="Guru">
            <h5 class="smartmentor-light-blue mt-3">Oi, eu sou o Guru! Vou precisar que me conte umas coisas</h5>
            <h6>
            Para encontrar uma solução mais apropriada ao seu desafio, eu gostaria de entender seu segmento.
            </h6>

            <div class="card shadow-none border border-3 rounded-7 border-smartmentor-dark-pink">
                <div class="card-body p-2">
                    <h5 class="mb-0">
                        <strong class="me-2">Aviso:</strong> Ao se registrar em nossa plataforma você está de acordo com nossos 
                        <!-- <a href="{{ route('termos-de-uso') }}" target="_blank" class="smartmentor-dark-pink">termos de uso</a> e 
                        <a href="{{ route('politicas-de-privacidade') }}" target="_blank" class="smartmentor-dark-pink">políticas de privacidade</a> -->
                        <a href="https://drive.google.com/file/d/1b4JIs3wKQ_6zHSHw1qLtKQ-o1ygctVaF/view" target="_blank" class="smartmentor-dark-pink">termos de uso</a> e 
                        <a href="https://drive.google.com/file/d/1su95L41IrCSIMzdzqHSZb0d5aH33wajJ/view" target="_blank" class="smartmentor-dark-pink">políticas de privacidade</a>
                    </h5>
                </div>
            </div>
        </div>
    </section>

<section class="bg-smartmentor-gray">
        <div class="py-2 px-md-5 px-2">
            <div class="row mx-0 px-0">
                <div class="col-md-9 py-md-4 my-md-0 my-3">
                    <ul class="nav nav-tabs d-none" id="form-tabs" role="tablist">

                    <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tabs-segments" data-mdb-toggle="tab" href="#tab-segments" role="tab" aria-controls="tab-segments" aria-selected="false">Segmentos</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tabs-interests" data-mdb-toggle="tab" href="#tab-interests" role="tab-interests" aria-controls="tab-interests" aria-selected="false">Áreas de Interesse</a>
                        </li>
                        </ul>
                 <div class="tab-content" id="form-content">
                        <div class="tab-pane fade" id="tab-segments" role="tabpanel">
                            @include('auth.components.mentor.segments')
                        </div>
                        <div class="tab-pane fade" id="tab-interests" role="tabpanel">
                            @include('auth.components.mentor.interests')
                        </div>
                </div>

                <div>
                        <button class="smartmentor-btn smartmentor-btn-dark-pink mt-md-3 mb-md-0 mb-3 ripple-surface" id="previousAction" data-previous="personalData">
                            Página anterior
                        </button>
                        <button class="smartmentor-btn smartmentor-btn-dark-pink mt-md-3 mb-md-0 mb-3 ripple-surface" id="nextAction" data-next="segments">
                            Próxima página
                        </button>
                 </div>

                 <div>
                        <button class="smartmentor-btn smartmentor-btn-dark-pink mt-md-3 mb-md-0 mb-3 ripple-surface" id="notification">
                            Me notifique
                        </button>

                 </div>
            </div>
        </div>
    </section>
    @endsection

    @push('scripts')
    <script src="{{ asset('js/auth/mentee.js?v=0.0.2.0') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('pages/auth/register.css?v=0.0.1.0') }}">
@endpush