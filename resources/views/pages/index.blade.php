@extends('template.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/home.css?v=0.0.1.0')}}">
@endpush

@section('content')
    <section id="topimage" class="position-relative">
        <img src="{{ asset('storage/images/home_1.png') }}" class="img-fluid home-img-1" alt="">
        <h4 class="tdh-1">Para todo desafio existe uma resposta</h4>
        <h5 class="tdh-2">Nós pesquisamos, procuramos e conectamos os seus desafios á mentores que irão te guiar nessa jornada</h5>
        <h5 class="tdh-2_2">Aproveite a etapa da fase beta, compartilhe e deixe seu feedback</h5>
        <!-- <h5 class="tdh-2">Aproveite etapa da fase beta, compartilhe e deixe seu feedback</h5> -->
        <h1 class="tdh-3" id="ChallengeToday">
            <svg width="51" height="51" class="me-2" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect width="51" height="51" fill="url(#pattern0)"/><defs><pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1"><use xlink:href="#image0_108_430" transform="scale(0.0104167)"/></pattern><image id="image0_108_430" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAD5ElEQVR4nO2cz4sURxiG32/GzJhxF5P1sHQORnNLFgziLSfRnRU1174IcSMxgRAUxAU9md2bIiIiXkTx192bQXf0Hwh4SGBNwIvksEM8TGZNcojO9udFIRena6ar+uuZfp9rV3e91DNVXT3VXQAhhBBCCCGEEEIIKQsy6AntffMzojiqiiaAbQA2+Y/llX8BPBPFsmrlWvToxhPrQP/HWcBKHNemuo0LAL4HUA0XKSjrClyJOvUFeXz1lXUYwFHAShzXPlxr3BPFbOhAeaBAK+rUDxZBQsWl0FS3cWFcGh8ABGi2p16et84BOPSA9r75GST4BaM77LyLnmqy46OHd36zDJHaAzSRbzF+jQ8AG0SqR61DpAoQaDOPIDbonHUCl3vA1uAprFB8bB3BRcBE8BRWCCatIzjNgkg4KMAYCjCGAoyhAGMowBgKMIYCjKEAYyjAGAowZoN1gKLTbs5rSpFMa87sAdnZBGBGBSdQSX5dbc5f0l3fved6MgX4pSrA8fbUf/dcJVBAAAZZc6aAQAj0h9XZrz5NK0cB4XBac6aAoKSvOVNASBzWnCkgJA5rzhRgDAUYQwHGUIAxFGAMBRhDAcaUXcCLfgef7j9WDx2g7AL+6Hdwcr27OXSAcgsQ3O97PKl+EjpCmQX0FHK9X4FEks9DhyjtmrAoLketm7/3LQPZGzpHKXuAAMvTf9VP9SvzfHc8AeBA6CxlE9ATxcXpTv3LtG+Ee7XGIeSwC0AZhqB/ADwD8EA1uR45fJb6dP+xuvRenA4fzbcAkaVo+eai12saMNlbO6mQ7XnU5W8IUl0ch8b/c+7IFwo5k1d9fgSoLkYPby95uZYhq7OHtyaa3AUQ/An4LdkFiCyNS+OLyE8ApvOsN5uAMRp2RORnADN51z38TVhkKWrdGulf/koc17Z0319INPkRQM0iw3ACRny283x3PNGrNQ5JF6cVyGW28y4GFzBijb8Sx7Utaxs/ALA90epOge5ZBw6IFmOrtcEEqC76HnYc3r/PRhd4W4EgbFXD4H4THpOpZtFwE8DGD0a6gDGZ5xeVVAHBb7iKv4Nev+DY/x0t/ddlxx1zAaJYts5gibkA1co1AOvWOawwFxA9uvFEgSvWOawwFwAAUae+oEDLOocFhRAgj6++ijr1gwq5BKBnnSdPBt6+PjTtvUc+Q0W/efOB2zaM+LaZUetW3zYunICi024ePgXIWdfyaQIKMQSNElHr9jlAvb0xQQFD4FMCBQyJLwkUkAEfEiggI1klUIAHskigAE8MK4ECPDKMBArwzKASKCAAvh/WyJC0574emfenCCGEEEIIIfnxGgCpHDUzeasAAAAAAElFTkSuQmCC"/></defs></svg>
                Faça seu diagnóstico gratuito
        </h1>
    </section>

    <section id="guru">
        <div class="container">
            <img src="{{ asset('storage/images/guru.png') }}" width="106" height="98" alt="Guru">
            <h2 class="smartmentor-dark-blue my-1">Mentoria</h2>
            <p>
            Estamos selecionando mentores que se identifiquem com o nosso propósito em apoiar projetos
            que querem se destacar em seus mercados. Inscreva-se e conheça melhor as vantagens em ser
            um mentor SmartMentor
            </p>

            <div class="container-btn">
                <button class="mentorBtn" data-action="login">Já sou mentor</button>
                <button class="mentorBtn" data-action="register">Quero ser mentor</button>
            </div>
        </div>
    </section>

    <section id="guru2">
        <div class="container">
            <div class="card rounded-9">
                <div class="card-body text-center">
                    <div class="row justify-content-center align-content-center mx-0 px-0" style="margin-top: 3em;margin-bottom:3em">
                        <div class="col-md-4 d-flex justify-content-center align-content-center my-3">
                            <p>
                              <h4><b>  CANSADO DE PERDER TEMPO PERGUNTANDO? </b></h4>
                                <!-- <a href="" class="smartmentor-dark-pink font-weight-bold">Saiba mais.</a> -->
                            </p>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center align-content-center my-3">
                            <div>
                                <img src="{{ asset('storage/images/guru.png') }}" width="182" height="166" alt="Guru">
                                <h1 class="my-1 smartmentor-light-blue">GURU</h1>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center align-content-center my-3">
                            <p>
                           <h5><b> Conte para o Guru qual é o seu desafio, ele irá procurar e lhe oferecer a melhor solução</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="funcionamento">
        <h3 >Entenda como funciona:</h3>

        <div class="passos">
            <x-home.entenda-funcionamento-passo :passo=1 text="Faça o cadastro e adicione o briefing do seu desafio. Escolha o segmento e a área de atuação.
            Não se preocupe, as suas informações estão seguras." />
            <x-home.entenda-funcionamento-passo :passo=2 text="Iremos pesquisar pela solução em nosso banco de dados, e também em nossa rede de mentores. Você será informado do prazo para receber a solução." />
            <x-home.entenda-funcionamento-passo :passo=3 text="Você receberá um aviso de que a sua solução foi encontrada, junto com ela você receberá também uma lista de metores que ajudou na solução, podendo pedir um agendamento de sessão com esse mentor" />
        </div>

        <button id="ChallengeToday1">Experimente agora</button>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('mdb/js/mdb.min.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
@endpush
