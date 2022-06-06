@php
    $id = md5('EntendaFuncionamentoPassos' . time() . $attributes->get('passo') . Str::random(32));
@endphp

@push('styles')
    <style>
        div[id="{{$id}}"][data-element="card"] {
            margin-left: 40px;
            margin-right: 40px;
            position: relative;
            width: calc(412px + 169px);
            height: calc(281px + 169px);
            display: flex;
            justify-content: center;
            align-items: end
        }

        div[id="{{$id}}"][data-element="card"] div[data-element="text"] {
            background: #FFFFFF;
            border-radius: 31px;
            width: 412px;
            height: 281px;
            color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 30px;
        }

        div[id="{{$id}}"][data-element="card"] div[data-element="passo"] {
            position: absolute;
            width: 169px;
            height: 169px;
            background: #112959;
            border: 7px solid #FFFFFF;
            color: #FFFFFF;
            box-sizing: border-box;
            border-radius: 10rem;
            font-style: normal;
            font-weight: 700;
            font-size: 64px;
            top: 40px;
            left: calc(50% - calc(169px / 2));
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
@endpush
<div data-element="card" id="{{ $id }}">
    <div data-element="passo">{{ $attributes->get('passo') }}</div>
    <div data-element="text">{{ $attributes->get('text') }}</div>
</div>