@extends('template.raw')

@section('content')
<x-menu />

<section class="text-center">
    <div class="container my-5">
        <img src="{{ asset('storage/images/guru.png') }}" width="106" height="98" alt="Guru">
        <h5 class="smartmentor-light-blue mt-3">Obrigado por se cadastrar!</h5>
        <h6>
            Um e-mail de verificação foi enviado para sua conta de e-mail. Por favor, verifique sua caixa de entrada para verificar.
        </h6>
        <h6 class="smartmentor-dark-pink">
            <small class="smartmentor-dark-pink">Atenção: Caso você não encontre na caixa de entrada, verifique a caixa de spam. As vezes pode ocorrer de parar lá.</small>
        </h6>
    </div>
</section>

<x-footer class="fixed-bottom" />
@endsection