@extends('layouts.app')

@section('content')

<section class="container col-md-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Atualização do Produto</h1>
        </div>
    </div>

    <!-- Validação para ver se recebeu um $id -->
    @if(isset($product))
    <form action="/produtos/atualizar/" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="idProduct" value="{{$product->id}}" hidden>
        <div class="form-group">
            <label for="nameProduct">Nome do Produto</label>
            <input class="form-control" type="text" name="nameProduct" id="nameProduct" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="descriptionProduct">Descrição</label>
            <textarea class="form-control" type="text" name="descriptionProduct" id="descriptionProduct">{{$product->name}}</textarea>
        </div>
        <div class="form-group">
            <label for="quantityProduct">Quantidade</label>
            <input class="form-control" type="number" name="quantityProduct" id="quantityProduct" value="{{$product->quantity}}">
        </div>
        <div class="form-group">
            <label for="priceProduct">Preço</label>
            <input class="form-control" type="number" step=".01" name="priceProduct" id="priceProduct" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <label for="imgProduct">Foto do Produto</label>
            <input class="form-control" type="file" name="imgProduct" id="imgProduct">
        </div>
        <button class="btn btn-success" type="submit">Atualizar Produto</button>
    </form>
    @endif

    <div class="row">
        <div class="col-md-12">
            @if(isset($result)) <!-- verifica se existe -->
                @if($result) <!-- verifica se é false -->
                    <h1>Deu certooooo!</h1>
                @else
                    <h1>Não deu certo sua atualização</h1>
                @endif
            @endif
        </div>
    </div>

</section>

@endsection