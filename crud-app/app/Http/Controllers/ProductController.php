<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Review;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('reviews');
        return view('products.index', ['products' => $products->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {

        if ($request->user()->cannot('create', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        };

        $product = new Product;
        return view('products.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', Product::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        };

        Product::create($this->validatedData($request));
        return redirect()->route('products.index')->with('success', 'Product was added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //may need to make this plural
        $product = Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if ($request->user()->cannot('update', [Product::class, Product::findOrFail($id)])) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }

        $product =  Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($request->user()->cannot('update', [Product::class, Product::findOrFail($id)])) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        };

        Product::findOrFail($id)->update($this->validatedData($request));
        return redirect()->route('products.index')->with('success', 'Product was updated');
                             }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($request->user()->cannot('delete', [Product::class, Product::findOrFail($id)])) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        };

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product was deleted');
    }

    private function validatedData($request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'decimal:2',
            'description' => 'required',
            'item_number' => 'integer|required',
        ]);
        return $validatedData;
    }
}
