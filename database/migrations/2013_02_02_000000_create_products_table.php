<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // realizar cambios
        Schema::create('products',function(Blueprint $tabla){
          $tabla->increments("id");// crea el campo id incrementable
          $tabla-> integer('user_id')->unsigned()->index();//  este campo va ser un foreign key por eso es que es index y no debe ser null
          $tabla->string('title');//string titulo
          $tabla->text('description');//text porque abarca mas caracteres
          $tabla->decimal('pricing',9,2);//double, tamaño del numero, cuantos decimales permite
          $tabla->timestamps();// cuando se creo y la ultima vez uqe se actualizo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // revierte cambios
        Schema::drop('products');// revierte lo cambios de la creacion de la tabla
    }
}
