@extends('agendas.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Agenda Telefônica</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('agendas.create') }}"> Criar Nova Agenda </a> 
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Nº</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Ação</th>


        </tr>
        @foreach ($agendas as $agenda)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $agenda->nome }}</td>
            <th>{{ $agenda->email}}</th>
            <th>{{ $agenda->nascimento}}</th>
            <th>{{ $agenda->cpf}}</th>
            <th>{{ $agenda->telefone}}</th>
            <td>
                <form action="{{ route('agendas.destroy',$agenda->id) }}" method="POST">
   
                    <a class="btn btn-success" href="{{ route('agendas.show',$agenda->id) }}">Mostrar</a>
    
                    <a class="btn btn-primary" href="{{ route('agendas.edit',$agenda->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Apagar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $agendas->links() !!}
      
@endsection