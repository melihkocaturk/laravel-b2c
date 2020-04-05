@extends('layouts.app')

@section('title', $product->name)

@section('content')
  {{ Breadcrumbs::render('product', $product) }}
  <div class="row">
    <div class="col-lg-9">
      <img class="img-fluid mb-4" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
        </li>
      </ul>
      <div class="tab-content py-3">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">{!! $product->description !!}</div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">...</div>
      </div>
    </div>
    <!-- /.col-lg-9 -->
    <div class="col-lg-3 mb-4">
      <h1>{{ $product->name }}</h1>
      <p class="h3">@money($product->price)</p>
      <p>{!! $stockLevel !!}</p>
      <p>{{ $product->subtitle }}</p>
      <p><strong>Stock Code:</strong> {{ $product->sku }}</p>
      @if ($product->quantity > 0)
        <small class="text-muted">Quantity</small>
        <form action="{{ route('cart.store') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $product->id }}">
          <input type="hidden" name="name" value="{{ $product->name }}">
          <input type="hidden" name="price" value="{{ $product->price }}">
          <div class="input-group mb-3">
            <input type="text" name="quantity" class="form-control" value="1">
            <div class="input-group-append">
              <input type="submit" class="btn btn-primary" value="Add to Cart">
            </div>
          </div>
        </form>
      @endif
    </div>
    <!-- /.col-lg-3 -->
  </div>
  <!-- /.row -->
@endsection
