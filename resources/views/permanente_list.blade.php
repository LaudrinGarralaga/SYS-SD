@extends('adminlte::page')

@section('title', 'Lista de Reservas Permanentes')

@section('content_header')
@stop
@section('content')

@if (session('status'))
<div class="col-sm-12">
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
</div>
@endif

<div class="box">
    <div class="box-header">
        <div class='col-sm-11'>
            <h3>Lista de Reservas Permanentes</h3>
        </div>
        <div class='col-sm-1'>
            <a href='{{route('permanentes.create')}}' class='btn btn-primary' 
               role='button'> Novo </a>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Cliente</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Data Inicial</th>
                    <th>Data Final</th>
                    <th>Horário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permanentes as $permanente) 
                <tr>
                    <td> {{$permanente->id}} </td>
                    <td> {{$permanente->nome}} </td>
                    <td> {{$permanente->telefone}} </td>
                    <td> {{$permanente->email}} </td>
                    <td> {{$permanente->dataInicial}} </td>
                    <td> {{$permanente->dataFinal}} </td>
                    <td> {{$permanente->hora}} </td>
                    <td> <a href='{{route('permanentes.edit', $permanente->id)}}'
                            class='btn btn-info' 
                            role='button'> Alterar </a>
                        <form style="display: inline-block"
                              method="post"
                              action="{{route('permanentes.destroy', $permanente->id)}}"
                              onsubmit="return confirm('Confirma Exclusão?')">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <button type="submit"
                                    class="btn btn-danger"> Excluir </button>
                        </form>                                 
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>    
        {{ $permanentes->links() }}      
    </div>
</div>

@stop

