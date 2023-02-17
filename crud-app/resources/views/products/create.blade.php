@extends('layout')

@section('content')
<div class="container mt-5">
<div class="column col-3">
  <h3>Add a Product</h3>
</div>

@if ( $errors->any() )
<div class="alert alert-danger" role="alert">
  @forEach ( $errors->all() as $error)
  <span>{{$error}}</span><br />
  @endForEach
</div>
@endIf

<form method="POST" action="{{route('products.store')}}">
  @csrf
  <div class="form-group">
    @include('products.form')
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add Product</button>
    <a href="{{route('products.index')}}" class="btn btn-danger">Cancel</a>
  </div>
</form>
</div>
@endSection