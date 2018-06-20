@extends('adminlte::page')

@section('title', 'Lista de Reservas')

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
            <h3>Lista de Reservas</h3>
        </div>
        <div class='col-sm-1'>
            <a href='{{route('dias.create')}}' class='btn btn-primary' 
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
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dias as $dia) 
                <tr>
                    <td> {{$dia->id}} </td>
                    <td> {{$dia->nome}} </td>
                    <td> {{$dia->telefone}} </td>
                    <td> {{$dia->email}} </td>
                    <td> {{$dia->data}} </td>
                    <td> {{$dia->hora}} </td>
                    <td> <a href='{{route('dias.edit', $dia->id)}}'
                            class='btn btn-info' 
                            role='button'> Alterar </a>
                        <form style="display: inline-block"
                              method="post"
                              action="{{route('dias.destroy', $dia->id)}}"
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
        {{ $dias->links() }}      
    </div>
</div>

@stop

