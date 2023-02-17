    
    @extends('layout')

    @section('content')
    <h3>Products</h3>
    <table class ="table table-striped table-hover">
    <thead>
    <tr>
      <th>Product Name</th>
      <th>Product Price</th>
      <th>Product Description</th>
      <th>Product Item Number</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
    <tr>
      <td>{{$product->name}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->item_number}}</td>
      <td><a href="{{ route('products.show', $product->id) }}">Show Details</a></td>
    </tr>
    @endforeach
  </tbody>
    </table>    
    @endsection


