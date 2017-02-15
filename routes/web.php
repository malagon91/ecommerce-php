<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//como responde la pagina ahorita responde con un view dewelcome
Route::get('/', 'MainController@home'); // lo modifico y ahora respondo con al maincontroller en su metodo home
Route::get('/carrito', 'ShoppingCartsController@index');
Auth::routes();
Route::resource('products','ProductsController');//(pseudomnimo de http,nombre del controlador)
Route::resource('in_shopping_carts','InShoppingCartsController',['only'=> ['store','destroy']]);// para que solo genere los 2 metodos que dejamos
/* ahora asi se va a comportar rel producto depende de la instruccion que le date_timezone_set
GET/products  va ala accion index del controlador
POST/products va a la accion store del controlador
GET/products/create  muestra el formulario para crear un producto
GET/products/:id  muestra un producto
GET/products/:id/edit  formulario de edicion
PUT/products/:id  actualiza el producto
DELETE/products/:id elimina el producto
*/

Route::get('/home', 'HomeController@index');
