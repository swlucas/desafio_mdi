@extends('products.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adicionar Novo Produto</h2>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger" role="alert">
    <strong>Ops!</strong> Existe alguns problemas de inserção<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="codigo">Código</label>
            <input type="text" name="code" class="form-control" id="codigo" placeholder="Código">
            <small id="emailHelp" class="form-text text-muted">Exemplo: ABC123</small>
        </div>

        <div class="form-group col-md-6">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Nome">
        </div>

        <div class="col-auto">
            <label for="price">Preço</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">R$</div>
                </div>
                <input type="number" id="price" name="price" class="form-control" aria-label="Amount (to the nearest real)" placeholder="Preço">
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Descrição</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrição"></textarea>
    </div>

    <a class="" href="{{ route('products.index') }}"> <button type="button" class="btn btn-primary">Voltar</button></a>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection
