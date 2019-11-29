@extends('layouts.app')

@section('content')

<section class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nameProduct">Nome do Produto</label>
            <input class="form-control" type="text" name="nameProduct" id="nameProduct">
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <input class="form-control" type="text" name="description" id="description">
        </div>
        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input class="form-control" type="number" name="quantity" id="quantity">
        </div>
        <div class="form-group">
            <label for="price">Preço</label>
            <input class="form-control" type="text" name="price" id="price">
        </div>
    </form>
</section>

@endsection