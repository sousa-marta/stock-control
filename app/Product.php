<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function users(){
        return $this->belongsTo('App\Users'); //faz o relacionamento entre as entidades
    }


/*  public $tableName = "products"; //se a tabela no bando de dados não estiver no plural, uso esse comando
    public $primaryKey = "productId";
    public $timestamps = false; //se não estiver trabalhando com timestamp, laravel pede; */
}
