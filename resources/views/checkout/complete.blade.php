@extends('layouts.app')

@section('content')
  <div class="jumbotron bg-white text-center">
    <h1 class="display-4">Thank You!</h1>
    <p class="lead"><strong>Please check your email</strong> for confirmation.</p>
    <hr>
    <p>
      Having trouble? <a href="mailto:">Contact us</a>
    </p>
    <p>
      <a href="{{ route('home') }}" class="btn btn-primary btn-sm">Back to Home</a>
    </p>
  </div>
@endsection
