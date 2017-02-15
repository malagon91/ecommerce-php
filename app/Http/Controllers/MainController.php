<?php

namespace App\Http\Controllers;// se le da la ruta del archivo para evitar errores
use Illuminate\Http\Request; //imports

use App\Http\Requests;
use App\ShoppingCart;

class MainController extends Controller{
  //todos mis controller deben heredar Controller  que tiene la funcionalidad basica
  //es necesario usar namespaces para evitar conflictos

  public function home(){

    return view('main.home');// en el objeto se manda las variables que va a recibir del controllador
  }
}
