@extends('layouts.app')

@section('title', 'Search')

@section('content')
  {{ Breadcrumbs::render('search') }}
  <div class="row">
    <div class="col-lg-3">
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title">Sort By</h5>
          <ul>
            <li><a href="{{ route('product.search', ['key' => request()->key, 'sort' => 'id', 'order' => 'desc']) }}">New</a></li>
            <li><a href="{{ route('product.search', ['key' => request()->key, 'sort' => 'id', 'order' => 'asc']) }}">Old</a></li>
            <li><a href="{{ route('product.search', ['key' => request()->key, 'sort' => 'name', 'order' => 'asc']) }}">Name [A-Z]</a></li>
            <li><a href="{{ route('product.search', ['key' => request()->key, 'sort' => 'name', 'order' => 'desc']) }}">Name [Z-A]</a></li>
            <li><a href="{{ route('product.search', ['key' => request()->key, 'sort' => 'price', 'order' => 'asc']) }}">Price Low to High</a></li>
            <li><a href="{{ route('product.search', ['key' => request()->key, 'sort' => 'price', 'order' => 'desc']) }}">Price High to Low</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /.col-lg-3 -->
    <div class="col-lg-9">
      <h1 class="h3 mb-3">Search - {{ request()->key }}</h1>
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
      <!-- /.row -->

      {{ $products->withQueryString()->links() }}
    </div>
    <!-- /.col-lg-9 -->
  </div>
  <!-- /.row -->
@endsection
