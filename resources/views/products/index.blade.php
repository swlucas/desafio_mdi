@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 mb-3">
        <div class="pull-left">
            <h2>Desafio MDI</h2>
        </div>
        <div class="btn-group">
            <a href="{{ route('products.create') }}">
                <button class="btn btn-secondary btn-sm" type="button">
                    Criar Novo Produto
                </button>
            </a>
            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#uploadFile">
                    Importar XML
                </button>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<table class="table table-dark table-hover">
    <tr>
        <th scope="col">Código</th>
        <th scope="col">Name</th>
        <th scope="col">Preço</th>
        <th scope="col" width="200px">Ação</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->code }}</td>
        <td>{{ $product->name }}</td>
        <td>R$ {{ number_format($product->price,2,',','') }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}">Ver</a>

                <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}">Editar</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<!-- Modal -->
<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="uploadFileTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadFileTitle">Importe .xml</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.upload') }}" method="post" enctype="multipart/form-data">
                    <input type="file" name="file" accept="text/xml">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


{!! $products->links() !!}


@endsection
