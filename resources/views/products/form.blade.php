{!! Form::open(['url' => $url,'method'=> $method]) !!}
<div class="form-group">
  {{Form::text('title', $product->title ,['class'=> 'form-control', 'placeholder'=>'Title..'])}}
</div>
<div class="form-group">
  {{Form::number('pricing',$product->pricing,['class'=> 'form-control', 'placeholder'=>'Pricing..'])}}
</div>
<div class="form-group">
  {{Form::textarea('description',$product->description,['class'=> 'form-control', 'placeholder'=>'Description..'])}}
</div>
<div class="form-group">
  <a href="{{url('/products')}}">Return to list</a>
  <input class="btn btn-success" value="go" type="submit">
</div>

{!! Form::close() !!}
