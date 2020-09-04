@extends('master')
@section('body')

<div class="container" style="margin-top: 100px;">
    <div class="row">
    <form method="POST" action="{{ route('sales.list') }}">
    @csrf

    <div class="form-group">
      <label for="exampleInputPassword1">Signature key</label>
      <input type="text" class="form-control" name="signature_key" required>
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
        <p>Jumlah : {{ $response->count }}</p><br>

        @foreach($response->items as $item)
        <p>sales_id: {{ $item->sales_id }}</p>
        <p>signature_key: {{ $item->signature_key }}</p>
        <p>payment_type: {{ $item->payment_type }}</p>
        <p>gross_amount: {{ $item->gross_amount }}</p>
        <p>currency: {{ $item->currency }}</p>
        <p>sales_status: {{ $item->sales_status }}</p>
        <p>created_at: {{ $item->created_at }}</p>
        <hr>
        @endforeach

    </div>
</div>

@endif

@endsection