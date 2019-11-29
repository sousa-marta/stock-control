@extends('layouts.app')

@section('content')

<section class="container col-md-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Cadastro de Produto</h1>
        </div>
    </div>
    <form action="/produtos/cadastrar" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nameProduct">Nome do Produto</label>
            <input class="form-control" type="text" name="nameProduct" id="nameProduct">
        </div>
        <div class="form-group">
            <label for="descriptionProduct">Descrição</label>
            <textarea class="form-control" type="text" name="descriptionProduct" id="descriptionProduct"></textarea>
        </div>
        <div class="form-group">
            <label for="quantityProduct">Quantidade</label>
            <input class="form-control" type="number" name="quantityProduct" id="quantityProduct">
        </div>
        <div class="form-group">
            <label for="priceProduct">Preço</label>
            <input class="form-control" type="number" step=".01" name="priceProduct" id="priceProduct">
        </div>
        <div class="form-group">
            <label for="imgProduct">Foto do Produto</label>
            <input class="form-control" type="file" name="imgProduct" id="imgProduct">
        </div>
        <button class="btn btn-success" type="submit">Enviar</button>
    </form>
</section>

@endsection