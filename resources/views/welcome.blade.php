@extends('layouts.app')

@section('content')
  <div class="jumbotron">
    <h1 class="h2">Open Source E-commerce Platform</h1>
    <p class="lead">Laravel B2C is an open source PHP based online e-commerce solution. Develop your own e-commerce platform on this essential app.</p>
    <a class="btn btn-primary" href="#" role="button">Download</a>
  </div>
  <div class="row">
    @foreach ($products as $product)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="{{ route('product.show', $product->slug) }}"><img class="card-img-top" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
            </h4>
            <p class="h5">@money($product->price)</p>
            <p class="card-text">{{ $product->subtitle }}</p>
            <form action="{{ route('cart.store') }}" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="id" value="{{ $product->id }}">
              <input type="hidden" name="name" value="{{ $product->name }}">
              <input type="hidden" name="quantity" value="1">
              <input type="hidden" name="price" value="{{ $product->price }}">
              <input type="submit" class="btn btn-sm btn-primary btn-block" value="Add to Cart">
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
