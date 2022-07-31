@extends('template.app')

@section('content')
    <form action="{{ route('authenticate') }}" method="post">
        @csrf
        <section class="text-center">
            <div class="bg-smartmentor-gray my-5 py-5">
                <div class="row justify-content-center mx-0 px-0">
                    <div class="col-md-3 col-sm-6 col-10">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center align-items-center border-0">
                                <div class="bg-smartmentor-gray" style="width: 60%;height:15px;border-radius:10rem"></div>
                            </div>
                            <div class="card-body">
                                <div class="text-cente">
                                    <img src="{{ asset('storage/images/guru.png') }}" width="86" height="78" alt="Guru">
                                    <h6 class="mt-3">Por favor faça seu login para continuar</h6>
                                </div>
    
                                <div class="row mx-0 px-0 justify-content-center">
                                    <div class="col-md-8 mx-0 px-0 my-4">
                                        <div class="smartmentor-control">
                                            <input class="m-0 p-0 w-100" type="email" name="email" id="email" autocomplete="off" placeholder="E-mail">
                                        </div>
                                    </div>
                                    <div class="col-md-8 mx-0 px-0 my-4">
                                        <div class="smartmentor-control">
                                            <input class="m-0 p-0 w-100" type="password" name="password" id="password" autocomplete="off" placeholder="Senha">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mx-0 px-0 my-5">
                                        <button class="smartmentor-btn smartmentor-btn-dark-pink mt-md-3 mb-md-0 mb-3 ripple-surface" type="submit">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('pages/auth/login.css?v=0.0.1.0') }}">
@endpush

@push('scripts')
    <json errors='@json($errors->all())'></json>
    <script src="{{ asset('js/auth/login.js?v=0.0.1.0') }}"></script>
@endpush