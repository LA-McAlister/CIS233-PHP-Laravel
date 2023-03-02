<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

  public function store(Request $request)
  {
    Review::create($this->validatedData($request));
    return redirect()->route('products.show', $request->product_id)->with('success', 'Comment was added');
  } 

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */

  public function destroy($review_id)
  {
    $review = Review::findOrFail($review_id);
    $review->delete();

    return redirect()->route('products.show', $review->product_id)->with('success', 'Comment was deleted');
  } 

  private function validatedData($request)
  {
    $validatedData = $request->validate([
      'comment' => 'required',
      'rating' => 'integer',
      'product_id' => 'integer|required',
    ]);
    return $validatedData;
  }
}
