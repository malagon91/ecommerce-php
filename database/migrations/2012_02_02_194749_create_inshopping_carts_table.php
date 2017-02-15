<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInshoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('in_shopping_carts',function(Blueprint $tabla){
              $tabla->increments("id");
              $tabla->integer("product_id");
              $tabla->integer("shopping_cart_id");
              $tabla->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('shopping_carts');
    }
}
