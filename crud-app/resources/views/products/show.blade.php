@extends('layout')

@section('content')


<h3>Show Product Detail</h3>
<table class = "table table-striped table-hover">
 <thead>
    <th>Product ID</th>
    <th>Product Name</th>
    <th>Product Price</th>
    <th></th>
</thead>
<tbody>
    <tr>
    <td>{{$product->id}}</td>
    <td>{{$product->name}}</td>
    <td>{{$product->price}}</td>
    <td><a href="{{ route('products.index') }}">All Products</a></td>
    </tr>
</tbody>
</table>
@endsection