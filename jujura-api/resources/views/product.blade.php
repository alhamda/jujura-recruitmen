@extends('master')
@section('body')

<div class="container" style="margin-top: 100px;">
    <div class="row">
    <form method="POST" action="{{ route('product') }}">
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
        
        @foreach($response->items as $item)
        <p>product_id: {{ $item->product_id }}</p>
        <p>name: {{ $item->name }}</p>
        <p>price: {{ $item->price }}</p>
        <p>stock: {{ $item->stock }}</p>
        <hr>
        @endforeach

    </div>
</div>

@endif

@endsection