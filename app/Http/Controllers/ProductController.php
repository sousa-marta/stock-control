<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; //importando modelo do user
use App\Product;
use Auth;

class ProductController extends Controller
{
    public function create(Request $request){

        //Responsável por cadastrar um produto:
        // dd($request->nameProduct); checar se está recebendo do form
        $newProduct = new Product();
        $newProduct->name = $request->nameProduct;
        $newProduct->description = $request->descriptionProduct;
        $newProduct->quantity = $request->quantityProduct;
        $newProduct->price = $request->priceProduct;
        $newProduct->user_id = Auth::user()->id; //auth é uma classe global que já existe no laravel que toda vez que usa o padrão de autenticação o laravel já salva o usuário nessa classe. user retorna informações do usuário logado no seu sistema

        $result = $newProduct->save(); //retorna boleano

/*         if($result){
            echo "deu certo sem querry";
        }else {
            echo "deu ruim";
        } */

        return view('products.form', ["result"=>$result]);

/*      //Jeito não recomendado de fazer, dois métodos para uma função 
        //verificar se estou recebendo um get ou um post
         if($request->isMethod('GET')){
            return view('formulario');
        }else {
            //Faço cadastro do produto
        } */
    }

    public function viewForm(Request $request){   //poderia ser index para dizer que é a primeria função a ser executada
        return view('products.form');
    }

    public function update(Request $request){
        //Para atualizar, devemos buscar um objeto ao invés de criar:
        //usando Product::find($idProduto)
        //vai ser necessário usar rotas com parâmetro
        // $newProduct = Product::find(3);
        $newProduct->name = $request->nameProduct;
        $newProduct->description = $request->descriptionProduct;
        $newProduct->quantity = $request->quantityProduct;
        $newProduct->price = $request->priceProduct;
        $newProduct->user_id = Auth::user()->id; //auth é uma classe global que já existe no laravel que toda vez que usa o padrão de autenticação o laravel já salva o usuário nessa classe. user retorna informações do usuário logado no seu sistema

        $result = $newProduct->save(); //retorna boleano
    }

    public function delete(Request $request){
        // para deletar vc vai usar Product::destroy($id);
    }

    public function viewAllProducts(Request $request){
        //vai precisar do Product::All
    }

    public function viewOneProduct(Request $request){
        // vai precisar do Product::find($idProduct);
    }
}
