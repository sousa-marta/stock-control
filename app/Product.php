<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //TEM QUE SER NO SINGULAR, POIS UM USUÁRIO TEM N PRODUTOS (se colocar no plural, vai dar ruim!!)
    public function user(){
        return $this->belongsTo('App\User'); //faz o relacionamento entre as entidades
    }


/*  public $tableName = "products"; //se a tabela no bando de dados não estiver no plural, uso esse comando
    public $primaryKey = "productId";
    public $timestamps = false; //se não estiver trabalhando com timestamp, laravel pede; */
}
