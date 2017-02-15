<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
  //necesitamos este arreglo para poder usar y asignar los campos en el create line 22
  protected $fillable =["status"];
    //
   public function inShoppingCarts(){//para la foreign key traer todos
     return $this->hasMany('App\InShoppingCart');
   }
   public function products(){//para la foreign key traer todos
     return $this->belongsToMany('App\Product','in_shopping_carts');
   }

    public function productSize(){
      return $this->products()->count();
    }
    public static function findOrcreateBySessionID($shopping_cart_id){
      if ($shopping_cart_id) {
        # busca el carrito
          return ShoppingCart::findBySession($shopping_cart_id);
      }else{
        #crea el carrito
        return ShoppingCart::createWithoutSession();
      }

    }

    public static function findBySession($shopping_cart_id){
      return ShoppingCart::find($shopping_cart_id);
    }
    public static function createWithoutSession(){
      return ShoppingCart::create([
        "status"=>"incompleted"
      ]);
      #$shopping_cart = new ShoppingCart; estas 4 lineas pueden ser reemplazadas por la de arriba
      #$shopping_cart->status = "incompleted";
      #$shopping_cart->save();
      #return $shopping_cart;
    }
    public function total(){
      return $this->products()->sum("pricing");
    }


}
