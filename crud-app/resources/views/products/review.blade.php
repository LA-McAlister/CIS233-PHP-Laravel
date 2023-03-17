<div class="column col-3">
  <h3>Add a Review:</h3>
  <form method="POST" action="{{route('reviews.store')}}">
    @csrf
</div>

@if ( $errors->any() )
<div class="alert alert-danger" role="alert">
  @forEach ( $errors->all() as $error)
  <span>{{$error}}</span><br />
  @endForEach
</div>
@endIf

<div class="container mt-5 form-group">
  <table class="table table-bordered mb-5">
    <label class="form-label" for="comment">Your Comment</label>
    <input type="text" class="form-control" rows="3" name="comment" value="{{old('comment')}}">
    <label class="form-label" for="rating">Choose Rating</label>
    <select class="form-select" name="rating">
          @forEach (range(1,5) as $ratingOption)
          <option value="{{$ratingOption}} ">{{$ratingOption}}</option>
          @endForEach
    </select>
    <label class="form-label" for="product_id" hidden>Product ID</label>
    <input type="number" name="product_id" class="form-control" value="{{$product->id}}" hidden />
  </table>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-primary">Add Review</button>
</div>
</form>
@if( count($product->reviews) == 0 )
<div>
    <p>
  <h2>No reviews</h2>
</div>
@else
<p>
<h2>Reviews:</h2>
<div class="container mt-5">
  <table class="table table-bordered mb-5">
    <thead>
      <tr class="table-success">
        <th scope="col">Comment</th>
        <th scope="col">Rating</th>
        <th scope="col">Date Added</th>
        @can('viewAny', App\Models\User::class)
        <th></th>
        @endCan
      </tr>
    </thead>
    <tbody>
      @foreach($product->reviews as $review). 
      <tr>
        <td><input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}"></td>
        <td scope="row">{{ $review->comment }}</td>
        <td class="text-nowrap">@for($i = 0; $i < $review->rating; $i++ ) &#9733 @endFor </td>
        <td>{{ $review->created_at }}</td>
        <td>
          <form class="btn btn-danger" action="{{route('reviews.destroy', $review->id)}}" method="POST" onSubmit="return confirm('Delete: press ok to confirm');">
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

@endIf
