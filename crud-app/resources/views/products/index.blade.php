    
    @extends('dashboard')

    @section('content')
  <div class="container mt-5">  
    <a class="btn btn-primary mb-2" href="{{route('products.create')}}">Create Product</a>
    <div class="d-flex ">
       {{ $products->links('pagination::bootstrap-4') }}
    </div>
  <table class ="table table-striped table-hover">
      <thead>
        <tr class="table-primary">
          <th scope="col">Product Name</th>
          <th scope="col">Product Price</th>
          <th scope="col">Product Description</th>
          <th scope="col">Product Item Number</th>
          <th scope="col">Image of Item</th>
          <th></th>
          <th></th>
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
          <td><img src="{{$product->image}}" alt="{{$product->image}}" class="img-thumbnail"></td>
          <td><a href="{{ route('products.show', $product->id) }}">Show Details</a></td>
          <td><a class="btn btn-secondary" href="{{route('products.edit', $product->id)}}">Edit</a></td>
          <td>
            <form class="btn btn-danger" action="{{route('products.destroy', $product->id)}}" method="POST" onSubmit="return confirm('Are you sure you want to delete?');">
            @csrf
            @method('DELETE')
          <button class="btn btn-error" type="submit">Delete</button>
            </form>
          </td>
        </tr>
    @endforeach
    </tbody>
  </table>    
  </div>
    @endsection

    
