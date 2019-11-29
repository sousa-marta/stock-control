<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request){

        //Responsável por cadastrar um produto:

/*
        //Jeito não recomendado de fazer, dois métodos para uma função 
        //verificar se estou recebendo um get ou um post
         if($request->isMethod('GET')){
            return view('formulario');
        }else {
            //Faço cadastro do produto
        }
 */
    }

    public function viewForm(Request $request){   //poderia ser index para dizer que é a primeria função a ser executada
        return view('products.form');
    }
}
