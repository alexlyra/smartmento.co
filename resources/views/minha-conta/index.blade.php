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