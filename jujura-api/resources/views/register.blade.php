@extends('master')
@section('body')

<div class="container" style="margin-top: 100px;">
    <div class="row">
    <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
      <label>Email address</label>
      <input type="email" class="form-control" name="user_email" required>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Nama Lengkap</label>
      <input type="text" class="form-control" name="user_name" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>


@if(!empty($response))

<br>
<hr>

<div class="container">
    <div class="row">
        <h1>Signature key: {{ $response->signature_key }}</h1>
        <h1>Message: {{ $response->message }}</h1>
    </div>
</div>

@endif



@endsection