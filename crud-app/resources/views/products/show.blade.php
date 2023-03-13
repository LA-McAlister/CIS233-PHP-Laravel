@extends('dashboard')

@section('content')

<div class="container mt-5">
<h3>Show Product Detail</h3>
  <table class="table table-bordered mb-5">
    <thead>
      <tr class="table-primary">
        <th scope="col">Product Number</th>
        <th scope="col">Product name</th>
        <th scope="col">Price</th>
        <th scope="col">Description</th>
        <th scope="col">Item Number</th>
        <th scope="col">Image</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">{{ $product->id }}</th>
        <td>{{ $product->name }}</td>
        <td>${{ number_format($product->price, 2) }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->item_number }}</td>
        <td><img src="{{$product->image}}" alt="{{$product->image}}" class="img-thumbnail"></td>
        <td>
          <h5><a href="{{ route('products.index', $product->id) }}">All Products</h5>
        </td>
      </tr>
    </tbody>
  </table>
</div>

@include('products.review')
@endsection