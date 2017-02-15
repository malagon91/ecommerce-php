<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\ShoppingCart;

class ShoppingCarProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // para las vistas
        view()->composer("*",function($view){
          $shopping_cart_id = \Session::get('shopping_cart_id');//checamos si ahi una variable de sesion con el carrito
          //sino la encuentra manda null
          $Shopping_cart = ShoppingCart::findOrcreateBySessionID($shopping_cart_id);
          \Session::put("shopping_cart_id", $Shopping_cart->id);
          $view->with("productsCount",$Shopping_cart->productSize());
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // para dependenci injection

    }
}
