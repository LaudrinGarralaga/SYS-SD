@extends('adminlte::page')

@section('title', 'Pesquisa de Reservas por Dia')

@section('content_header')
@stop
@section('content')

<div class="box">
    <div class="box-header">
        <div class='col-sm-11'>
            <h3> Pesquisa de Reservas por Dia </h3>
        </div>
        <div class='col-sm-1'>
            <br>
            <a href='{{route('dias.pesq')}}' class='btn btn-primary' 
               role='button'> Ver Todos </a>
        </div>
    </div>

    <div class="box-body">
        <form method="post" action="{{route('dias.filtro')}}">
            {{ csrf_field() }}

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="nome"> Nome do Cliente </label>
                    <input type="text" id="nome" name="nome" class="form-control">
                </div>
            </div>

            <div class="col-sm-5">
                <div class="form-group">
                    <label for="data"> Data </label>
                    <input type="text" id="data" name="data" class="form-control">
                </div>
            </div>

            <div class="col-sm-1">
                <div class="form-group">
                    <label> &nbsp; </label>
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </form>

        @if (count($dias)==0)
        <div class="col-sm-12">
            <div class="alert alert-success">
                Não há reservas com os filtros definidos
            </div>
        </div>
        @endif

        <div class='col-sm-12'>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Cód.</th>
                        <th>Nome</th>
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
</div>

@endsection


