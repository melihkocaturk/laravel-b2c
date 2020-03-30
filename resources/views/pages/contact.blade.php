@extends('layouts.app')

@section('title', 'Contact')

@section('content')
  <h1 class="h3 mb-4">Contact</h1>
  <div class="row">
    <div class="col-md-8">
      <form class="mb-4">
        <div class="form-group">
          <label for="firstName">First name</label>
          <input type="text" name="firstName" class="form-control" id="firstName" placeholder="John" required>
        </div>
        <div class="form-group">
          <label for="lastName">Last name</label>
          <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Doe" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea name="message" class="form-control" style="height:150px" id="message" placeholder="How can we help you?" required></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Send">
      </form>
    </div>
    <div class="col-md-4">
      <strong>Customer service:</strong><br>
      Phone: +1 129 209 291<br>
      E-mail: <a href="mailto:support@mysite.com">support@mysite.com</a>
      <hr class="mb-4">
      <strong>Headquarter:</strong><br>
      Company Inc, <br>
      Las vegas street 201<br>
      55001 Nevada, USA<br>
      Phone: +1 145 000 101<br>
      <a href="mailto:usa@mysite.com">usa@mysite.com</a>
      <hr class="mb-4">
      <strong>Hong kong:</strong><br>
      Company HK Litd, <br>
      25/F.168 Queen<br>
      Wan Chai District, Hong Kong<br>
      Phone: +852 129 209 291<br>
      <a href="mailto:hk@mysite.com">hk@mysite.com</a>
    </div>
  </div>
@endsection
