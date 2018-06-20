@extends('adminlte::page')

@section('title', 'Pesquisa de Reservas Permanentes')

@section('content_header')
@stop
@section('content')

<div class="box">
    <div class="box-header">
        <div class='col-sm-11'>
            <h3> Pesquisa de Reservas Permanentes </h3>
        </div>
        <div class='col-sm-1'>
            <br>
            <a href='{{route('permanentes.pesq')}}' class='btn btn-primary' 
               role='button'> Ver Todos </a>
        </div>
    </div>

    <div class="box-body">
        <form method="post" action="{{route('permanentes.filtro')}}">
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

        @if (count($permanentes)==0)
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
                        <td> {{$permanente->dataInical}} </td>
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
</div>

@endsection


