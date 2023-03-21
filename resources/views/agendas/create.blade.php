@extends('agendas.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('agendas.index') }}"> Voltar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('agendas.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
        </div>
        <div class="row">
        <div class="form-group col-md-6">
            <div class="form-group">
                <strong>E-mail:</strong>
                <input type="text" name="email" class="form-control" placeholder="E-mail">
            </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
            <div class="form-group">
                <strong>Data de Nascimento:</strong>
                <input type="date" name="nascimento" class="form-control" placeholder="Data Nascimento">
            </div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
          <label for="inputFone" class="control-label">Telefone:</label>
          <input type="text" name="telefone" class="form-control" placeholder="Telefone">
        <div class="help-block with-errors"></div>
        </div>

        <div class="row">
        <div class="form-group col-md-6">
          <label for="inputFone" class="control-label">CPF:</label>
          <input type="text" name="cpf" class="form-control" placeholder="CPF">
        <div class="help-block with-errors"></div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
   
</form>
@endsection