<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;

class ShoppingCartsController extends Controller
{
    public function index(){
      $shopping_cart_id = \Session::get('shopping_cart_id');

      $Shopping_cart = ShoppingCart::findOrcreateBySessionID($shopping_cart_id);

      $products= $Shopping_cart-> products()->get();
      $total = $Shopping_cart->total();
      return view("shopping_carts.index",
                  ["products"=> $products,"total"=> $total]);

    }
}
