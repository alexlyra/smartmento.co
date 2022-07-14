@extends('template.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/css/home.css?v=0.0.1.0')}}">
@endpush

@section('content')
    <section id="topimage" class="position-relative">
        <img src="{{ asset('storage/images/home_1.png') }}" class="img-fluid home-img-1" alt="">
        <h4 class="tdh-1">Para todo desafio existe uma resposta</h4>
        <h5 class="tdh-2">Nós pesquisamos, procuramos e conectamos os seus desafios á mentores que irão te guiar nessa jornada</h5>
        <h1 class="tdh-3">
            <svg width="51" height="51" class="me-2" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><rect width="51" height="51" fill="url(#pattern0)"/><defs><pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1"><use xlink:href="#image0_108_430" transform="scale(0.0104167)"/></pattern><image id="image0_108_430" width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAD5ElEQVR4nO2cz4sURxiG32/GzJhxF5P1sHQORnNLFgziLSfRnRU1174IcSMxgRAUxAU9md2bIiIiXkTx192bQXf0Hwh4SGBNwIvksEM8TGZNcojO9udFIRena6ar+uuZfp9rV3e91DNVXT3VXQAhhBBCCCGEEEIIKQsy6AntffMzojiqiiaAbQA2+Y/llX8BPBPFsmrlWvToxhPrQP/HWcBKHNemuo0LAL4HUA0XKSjrClyJOvUFeXz1lXUYwFHAShzXPlxr3BPFbOhAeaBAK+rUDxZBQsWl0FS3cWFcGh8ABGi2p16et84BOPSA9r75GST4BaM77LyLnmqy46OHd36zDJHaAzSRbzF+jQ8AG0SqR61DpAoQaDOPIDbonHUCl3vA1uAprFB8bB3BRcBE8BRWCCatIzjNgkg4KMAYCjCGAoyhAGMowBgKMIYCjKEAYyjAGAowZoN1gKLTbs5rSpFMa87sAdnZBGBGBSdQSX5dbc5f0l3fved6MgX4pSrA8fbUf/dcJVBAAAZZc6aAQAj0h9XZrz5NK0cB4XBac6aAoKSvOVNASBzWnCkgJA5rzhRgDAUYQwHGUIAxFGAMBRhDAcaUXcCLfgef7j9WDx2g7AL+6Hdwcr27OXSAcgsQ3O97PKl+EjpCmQX0FHK9X4FEks9DhyjtmrAoLketm7/3LQPZGzpHKXuAAMvTf9VP9SvzfHc8AeBA6CxlE9ATxcXpTv3LtG+Ee7XGIeSwC0AZhqB/ADwD8EA1uR45fJb6dP+xuvRenA4fzbcAkaVo+eai12saMNlbO6mQ7XnU5W8IUl0ch8b/c+7IFwo5k1d9fgSoLkYPby95uZYhq7OHtyaa3AUQ/An4LdkFiCyNS+OLyE8ApvOsN5uAMRp2RORnADN51z38TVhkKWrdGulf/koc17Z0319INPkRQM0iw3ACRny283x3PNGrNQ5JF6cVyGW28y4GFzBijb8Sx7Utaxs/ALA90epOge5ZBw6IFmOrtcEEqC76HnYc3r/PRhd4W4EgbFXD4H4THpOpZtFwE8DGD0a6gDGZ5xeVVAHBb7iKv4Nev+DY/x0t/ddlxx1zAaJYts5gibkA1co1AOvWOawwFxA9uvFEgSvWOawwFwAAUae+oEDLOocFhRAgj6++ijr1gwq5BKBnnSdPBt6+PjTtvUc+Q0W/efOB2zaM+LaZUetW3zYunICi024ePgXIWdfyaQIKMQSNElHr9jlAvb0xQQFD4FMCBQyJLwkUkAEfEiggI1klUIAHskigAE8MK4ECPDKMBArwzKASKCAAvh/WyJC0574emfenCCGEEEIIIfnxGgCpHDUzeasAAAAAAElFTkSuQmCC"/></defs></svg>
             Qual seu desafio hoje?
        </h1>
    </section>

    <section id="guru">
        <div class="container">
            <img src="{{ asset('storage/images/guru.png') }}" width="106" height="98" alt="Guru">
            <h2 class="smartmentor-dark-blue my-1">Mentoria</h2>
            <p>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
            </p>

            <div class="container-btn">
                <button>Já sou mentor</button>
                <button>Quero ser mentor</button>
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
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin lorem eget pulvinar tempor. Vivamus id tempor nulla. Vestibulum dui est, egestas non convallis sed, malesuada non orci. Lorem ipsum dolor sit amet, consectetur . <a href="" class="smartmentor-dark-pink font-weight-bold">Saiba mais.</a>
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
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin lorem eget pulvinar tempor. Vivamus id tempor nulla. Vestibulum dui est, egestas non convallis sed. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin lorem 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="funcionamento">
        <h3>Entenda como funciona:</h3>

        <div class="passos">
            <x-home.entenda-funcionamento-passo :passo=1 text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin lorem eget pulvinar tempor. Vivamus id tempor nulla. Vestibulum dui est, egestas non convallis sed, malesuada non orci. Vivamus vel odio vel justo condimentum commodo imperdiet malesuada lectus. Integer scelerisque vestibulum dapibus." />
            <x-home.entenda-funcionamento-passo :passo=2 text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin lorem eget pulvinar tempor. Vivamus id tempor nulla. Vestibulum dui est, egestas non convallis sed, malesuada non orci. Vivamus vel odio vel justo condimentum commodo imperdiet malesuada lectus. Integer scelerisque vestibulum dapibus." />
            <x-home.entenda-funcionamento-passo :passo=3 text="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin lorem eget pulvinar tempor. Vivamus id tempor nulla. Vestibulum dui est, egestas non convallis sed, malesuada non orci. Vivamus vel odio vel justo condimentum commodo imperdiet malesuada lectus. Integer scelerisque vestibulum dapibus." />
        </div>

        <button>Experimente agora</button>
    </section>
@endsection
