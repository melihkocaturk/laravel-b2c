<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
          <a class="nav-item nav-link {{ Route::current()->getName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</span></a>
          <a class="nav-item nav-link {{ Route::current()->getName() == 'product.index' ? 'active' : '' }}" href="{{ route('product.index') }}">Products</a>
          <a class="nav-item nav-link {{ Route::current()->getName() == 'pages.about' ? 'active' : '' }}" href="{{ route('pages.about') }}" href="{{ route('pages.about') }}">About</a>
          <a class="nav-item nav-link {{ Route::current()->getName() == 'pages.contact' ? 'active' : '' }}" href="{{ route('pages.contact') }}" href="{{ route('pages.contact') }}">Contact</a>
        </div>
        <form action="{{ route('product.search') }}" class="my-2 my-lg-0 mr-2" method="get">
          <div class="input-group">
            <input type="text" name="key" class="form-control form-control-sm" value="{{ request()->key }}" placeholder="Search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-sm btn-secondary"><i class="fa fa-search fa-fw"></i></button>
            </div>
          </div>
        </form>
        <div class="navbar-nav">
          @unless (Auth::check())
            <a class="nav-item nav-link" href="{{ route('register') }}">Sign Up</a>
            <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
          @else
            <a class="nav-item nav-link" href="{{ url('/logout') }}">Logout</a>
          @endif
          <a class="nav-item nav-link {{ Route::current()->getName() == 'cart.index' ? 'active' : '' }}" href="{{ route('cart.index') }}">Cart
            @if (Cart::count() > 0)
              <span class="badge badge-pill badge-light">{{ Cart::count() }} </span>
            @endif
          </a>
        </div>
      </div>
    </div>
  </nav>
</header>
