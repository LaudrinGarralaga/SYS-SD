@extends('adminlte::page')

@section('title', 'Reserva Permanente')

@section('content_header')

<div class='col-sm-11'>
    @if ($acao == 1)
    <h2> Reserva Permanente </h2>
    @else 
    <h2> Alteração Reserva Permanente</h2>
    @endif
</div>
<div class='col-sm-1'>
    <a href='{{route('permanentes.index')}}' class='btn btn-primary' 
       role='button'> Voltar </a>
</div>

<div class="col-sm-12">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif    
</div>



<div class='col-sm-12'>
    @if ($acao == 1)
    <form method="post" action="{{route('permanentes.store')}}">
        @else 
        <form method="post" action="{{route('permanentes.update', $reg->id)}}">
            {!! method_field('put') !!}
            @endif
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nome">Nome do Cliente:</label>
                <input type="text" class="form-control" id="nome" 
                       name="nome" 
                       value="{{$reg->nome or old('nome')}}"
                       required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone do Cliente:</label>
                <input type="text" class="form-control" id="telefone" 
                       name="telefone" 
                       value="{{$reg->telefone or old('telefone')}}"
                       required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" 
                       name="email" 
                       value="{{$reg->email or old('email')}}"
                       required>
            </div>

            <div class="form-group">
                <label for="dataInicial">Data Inicial da Reserva:</label>
                <input type="text" class="form-control" id="dataInicial" 
                       name="dataInicial" 
                       value="{{$reg->dataInicial or old('dataInicial')}}"
                       required>
            </div>
            
            <div class="form-group">
                <label for="dataFinal">Data Final da Reserva:</label>
                <input type="text" class="form-control" id="dataFinal" 
                       name="dataFinal" 
                       value="{{$reg->dataFinal or old('dataFinal')}}"
                       required>
            </div>

            <div class="form-group">
                <label for="hora">Horário do Reserva:</label>
                <input type="text" class="form-control" id="hora" 
                       name="hora" 
                       value="{{$reg->hora or old('hora')}}"                   
                       required>
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>    
</div>
@endsection

