{!! Form::open(['url' => '/in_shopping_carts','method'=> 'POST' ,"class"=>"inline-block" ]) !!}
<input type="hidden"  name="product_id" value="{{$product->id}}"/>
<input type="submit"  value="Add in car" class="btn btn-info"/>

{!! Form::close() !!}
