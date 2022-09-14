@extends('template.app')

@section('content')
    <div id="myAccountContainer" data-user-status="{{ auth()->user()->status }}" class="py-5 px-md-5 px-2">
        <div class="row mx-0 px-0">
            <div class="col-md-3 d-flex flex-md-column flex-column-reverse align-items-center my-3 my-md-0">
                @if (auth()->user()->is_mentor === true)
                    @include('minha-conta.components.mentor-badge')
                @endif
            </div>

            <div class="col-md-9 my-3 my-md-0">
                @if (auth()->user()->is_mentor === true)
                    <div class="card rounded-7 shadow-none my-2">
                        <div class="card-body p-2 px-3">
                            <h5 class="smartmentor-light-blue mb-0">Bio</h5>
                        </div>
                    </div>
                    <div class="card rounded-7 shadow-none my-2">
                        <div class="card-body p-2 px-3">
                            <h5 class="smartmentor-light-blue mb-0">Desafio</h5>
                            <p>{{ auth()->user()->challenge ? auth()->user()->challenge->description : 'Sem informação' }}</p>
                            <h5 class="smartmentor-light-blue mb-0">Solução</h5>
                            <p>{{ auth()->user()->challenge ? auth()->user()->challenge->solution : 'Sem informação' }}</p>
                        </div>
                    </div>
                    <div class="row mx-0 px-0">
                        <div class="col-md-4 col-sm-8 col-12 mx-0 px-0">
                            <div class="card rounded-7 shadow-none my-2">
                                <div class="card-header p-2 text-center">Áreas</div>
                                <div class="card-body p-2 text-center">
                                    @foreach (auth()->user()->segments as $segment)
                                        <span class="badge badge-primary rounded-pill bg-smartmentor-dark-blue text-white">{{ $segment }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8 col-12 mx-0 px-0 px-md-2">
                            <div class="card rounded-7 shadow-none my-2">
                                <div class="card-header p-2 text-center">Atuações</div>
                                <div class="card-body p-2 text-center">
                                    @foreach (auth()->user()->interests as $interest)
                                        <span class="badge badge-primary rounded-pill bg-smartmentor-light-blue text-white">{{ $interest }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8 col-12 mx-0 px-0">
                            <div class="card rounded-7 shadow-none my-2">
                                <div class="card-header p-2 text-center">
                                    <h5 class="d-inline smartmentor-light-blue me-2">R$ {{ number_format(auth()->user()->price->price, 2, ',', '.') }}</h5> 
                                    <small class="font-weight-bold">/{{ auth()->user()->price->per === 'hour' ? 'hora' : 'aula' }}</small>
                                </div>
                                <div class="card-body p-2 text-center">
                                    <h6><i class="fa-solid fa-location-dot me-2"></i> {{ auth()->user()->price->{'face-to-face'} === true ? auth()->user()->price->{'face-to-face'} : 'Sem opção presencial' }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('pages/minha-conta/index.css?v=0.0.1.0') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/minha-conta.js?v=0.0.1.0') }}"></script>
@endpush