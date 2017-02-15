@extends('layouts.app')
@section('content')
<div class="container text-center">
  <div class=" card product text-left">
    <!--con este if valido si el user esta logeado para poder ver el product
     y que el usre logeado sea el que creo el product-->
    @if(Auth::check() && $product->user_id ==Auth::user()->id)
      <div class="absolute actions">
        <a href="{{url('/products/'.$product->id.'/edit')}}">
          Edit
        </a>
          @include('products.delete',['product' => $product])
      </div>
    @endif
    <h1>{{$product->title}}</h1>
    <div class="row">
      <div class="col-sm-6 col-xs-12">

      </div>
      <div class="col-sm-6 col-xs-12">
         <p>
           <strong>Description</strong>
         </p>
         <p>
           {{$product->description}}
         </p>
         <p>
           @include("in_shopping_carts.form",["product" => $product])
         </p>
      </div>
    </div>
  </div>
</div>
@endsection
