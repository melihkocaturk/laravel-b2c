<footer class="footer bg-light py-5 mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
        <ul class="list-inline mb-2">
          <li class="list-inline-item">
            <a href="{{ route('home') }}">Home</a>
          </li>
          <li class="list-inline-item">⋅</li>
          <li class="list-inline-item">
            <a href="{{ route('product.index') }}">Products</a>
          </li>
          <li class="list-inline-item">⋅</li>
          <li class="list-inline-item">
            <a href="{{ route('pages.about') }}">About</a>
          </li>
          <li class="list-inline-item">⋅</li>
          <li class="list-inline-item">
            <a href="{{ route('pages.contact') }}">Contact</a>
          </li>
        </ul>
        <p class="text-muted small mb-4 mb-lg-0">© {{ config('app.name') }} {{ now()->year }}. All Rights Reserved.</p>
      </div>
      <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
        <ul class="list-inline mb-0">
          <li class="list-inline-item mr-1">
            <a href="#" class="text-dark">
              <i class="fa fa-github fa-lg fa-fw"></i>
            </a>
          </li>
          <li class="list-inline-item mr-1">
            <a href="#" class="text-dark">
              <i class="fa fa-facebook fa-lg fa-fw"></i>
            </a>
          </li>
          <li class="list-inline-item mr-1">
            <a href="#" class="text-dark">
              <i class="fa fa-twitter-square fa-lg fa-fw"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#" class="text-dark">
              <i class="fa fa-instagram fa-lg fa-fw"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
