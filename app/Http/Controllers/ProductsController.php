<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response  Eloquent ORM laravel
     */
    public function index()//muestra la coleccion del recurso
    {
        $products = Product::all();//get de todos los productos
        return view("products.index" ,["products"=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//desplega la vista para crear un nuevo producto
    {
        //
        $product = new Product;
        return view("products.create",["product"=> $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//guarda el nuevo producto
    {
        //
        $product= new Product;
        $product -> title = $request->title;// asignamos al campo title de nuestra var local lo que traiga request en su misma variable title
        $product -> description = $request->description;
        $product -> pricing = $request->pricing;
        $product -> user_id = Auth::user()->id;//el controller auth nos devuelve el user que inicio secion y de ahi tomamos el id
        if($product -> save()){//guardo el product
          return redirect("/products");
        }else{//no guado el product
          return view("products.create",["product"=> $product]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//muestra un producto con el id que se indique
    {
        //
          $product = Product::find($id);//get product from orm
            return view("products.show",["product"=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)//muestra vun formulario para editar un producto
    {
        //
        $product = Product::find($id);//get product from orm
        return view("products.edit",["product"=> $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//actualiza un producto de edit
    {
        //
        $product = Product::find($id);
        $product -> title = $request->title;// asignamos al campo title de nuestra var local lo que traiga request en su misma variable title
        $product -> description = $request->description;
        $product -> pricing = $request->pricing;
        if($product -> save()){//guardo el product
          return redirect("/products");
        }else{//no guado el product
          return view("products.edit",["product"=> $product]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//elimina el producto
    {
        //
        Product::destroy($id);
      return redirect("/products");

    }
}
