@extends('dashboard')

@section('content')

<div class="container mt-5">
<div class="column col-3">
  <h3>Edit a Product</h3>
</div>

<form method="POST" action="{{route('products.update', $product->id)}}">
  @csrf
  @method('PUT')
  <div class="form-group">
    @include('products.form')
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Update Product</button>
    <a class="btn btn-danger" href="{{route('products.index')}}">Cancel</a>
  </div>
</form>
</div>
@endSection