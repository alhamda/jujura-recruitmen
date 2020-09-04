@extends('master')
@section('body')

<div class="container" style="margin-top: 100px;">
    <div class="row">
    <form method="POST" action="{{ route('sales.insert') }}">
    @csrf

    <div class="form-group">
      <label for="exampleInputPassword1">Signature key</label>
      <input type="text" class="form-control" name="signature_key" required>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Payment type</label>
        <input type="text" class="form-control" name="payment_type" required>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Gross Amount</label>
        <input type="number" class="form-control" name="gross_amount" required>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Currency</label>
        <input type="text" class="form-control" name="currency" required>
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
        <h1>Sales ID: {{ $response->sales_id }}</h1>
        <h1>Message: {{ $response->message }}</h1>
    </div>
</div>

@endif

@endsection