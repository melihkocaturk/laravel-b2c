@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <ul class="list-group mb-3">
        @foreach (Cart::content() as $item)
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">{{ $item->name }}</h6>
              <small class="text-muted">{{ $item->model->subtitle }}</small>
            </div>
            <span class="text-muted">@money($item->price)</span>
          </li>
        @endforeach
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">-$5</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Sub-Total</span>
          @money(Cart::subtotal())
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Tax</span>
          @money(Cart::tax())
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total</span>
          <strong>@money(Cart::total())</strong>
        </li>
      </ul>
      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <form action="{{ route('checkout.store') }}" method="post" novalidate>
        {{ csrf_field() }}
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" name="firstName" class="form-control" id="firstName" placeholder="John" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Doe" required>
          </div>
        </div>
        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
        </div>
        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
        </div>
        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment or suite">
        </div>
        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select name="country" class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select name="state" class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" name="zip" class="form-control" id="zip" required>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="sameAddress" class="custom-control-input" id="sameAddress">
          <label class="custom-control-label" for="sameAddress">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="saveInfo" class="custom-control-input" id="saveInfo">
          <label class="custom-control-label" for="saveInfo">Save this information for next time</label>
        </div>
        <hr class="mb-4">
        <h4 class="mb-3">Payment</h4>
        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input name="paymentMethod" type="radio" class="custom-control-input" id="credit" checked>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input name="paymentMethod" type="radio" class="custom-control-input" id="debit">
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input name="paymentMethod" type="radio" class="custom-control-input" id="paypal">
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name">
            <small class="text-muted">Full name as displayed on card</small>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number">
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration">
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv">
          </div>
        </div>
        <hr class="mb-4">
        <input type="submit" class="btn btn-primary btn-block" value="Continue to Checkout">
      </form>
    </div>
  </div>
@endsection
