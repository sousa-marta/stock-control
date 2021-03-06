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

        return view('products.formRegister', ["result"=>$result]);

/*      //Jeito não recomendado de fazer, dois métodos para uma função 
        //verificar se estou recebendo um get ou um post
         if($request->isMethod('GET')){
            return view('formulario');
        }else {
            //Faço cadastro do produto
        } */
    }

    public function viewForm(Request $request){   //poderia ser index para dizer que é a primeria função a ser executada
        return view('products.formRegister');
    }

    public function viewFormUpdate(Request $request, $id=0){ //valor padrão, se não passar nenhum id
        //Para atualizar, devemos buscar um objeto ao invés de criar. Usando rotas parametrizadas.
        $product = Product::find($id); //retorna boleano
        if($product){
            return view('products.formUpdate', ["product" =>$product]); //mandando pra view em forma de variável
        }else {
            return view('products.formUpdate'); //não passa nenhum valor para view para 'ativar' isset
        }
    }

    public function update(Request $request){
        $product = Product::find($request->idProduct);
        $product->name = $request->nameProduct;
        $product->description = $request->descriptionProduct;
        $product->quantity = $request->quantityProduct;
        $product->price = $request->priceProduct;
        //$product->user_id = Auth::user()->id; //não vamos usar pq não queremos que sobrescreva quem salvou da última vez
        
        $result = $product->save(); //retorna boleano

        return view('products.formUpdate', ["result"=>$result]);
    }

    public function delete(Request $request, $id=0){
        $result = Product::destroy($id);
        if($result){
            return redirect('/produtos');
        }
    }

    public function viewAllProducts(Request $request){
        $listProducts = Product::all();
        return view('products.productsList',["listProducts"=>$listProducts]);
    }

    public function viewOneProduct(Request $request){
        // vai precisar do Product::find($idProduct);
    }
}
