@extends('layouts.app')

@section('title', 'Cart')

@section('content')
  <h1 class="h3 mb-4">Cart</h1>
  <div class="row">
    <div class="col-12">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col" width="30%">Product</th>
              <th scope="col" width="15%">Status</th>
              <th scope="col" width="15%" class="text-center">Quantity</th>
              <th scope="col" width="15%" class="text-right">Price</th>
              <th scope="col" width="20%" class="text-right">Total</th>
              <th width="5%"> </th>
            </tr>
          </thead>
          <tbody>
            @foreach (Cart::content() as $item)
              <tr>
                <td><a href="{{ route('product.show', $item->model->slug) }}">{{ $item->name }}</a></td>
                <td>{{ $item->model->status }}</td>
                <td>
                  <form action="{{ route('cart.update', $item->rowId) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="input-group">
                      <input type="text" name="quantity" class="form-control form-control-sm" value="{{ $item->qty }}">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-refresh fa-fw"></i></button>
                      </div>
                    </div>
                  </form>
                </td>
                <td class="text-right">@money($item->price)</td>
                <td class="text-right">@money($item->total)</td>
                <td class="text-right">
                  <form action="{{ route('cart.destroy', $item->rowId) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times fa-fw"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-right">Sub-Total</td>
              <td class="text-right">@money(Cart::subtotal())</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-right">Tax</td>
              <td class="text-right">@money(Cart::tax())</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-right"><strong>Total</strong></td>
              <td class="text-right"><strong>@money(Cart::total())</strong></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col mb-2">
      <div class="row">
        <div class="col-sm-12 col-md-6 mb-3">
          <a href="{{ route('product.index') }}" class="btn btn-block btn-outline-secondary">Continue Shopping</a>
        </div>
        <div class="col-sm-12 col-md-6 text-right">
          @if (Cart::count() > 0)
            <a href="{{ route('checkout.index') }}" class="btn btn-block btn-success">Checkout</a>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
