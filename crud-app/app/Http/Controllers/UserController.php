<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($request->user()->cannot('viewAny', User::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }

        return view('users.index', ['users' => $users->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($request->user()->cannot('create', User::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }

        $user = new User;
        return view('users.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->user()->cannot('create', User::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        };

        User::create($this->validatedData($request));
        return redirect()->route('users.index')->with('success', 'User information was added');
    }

    /**
     * Display the specified resource.
     */
    
    public function edit($id)
    {
        if ($request->user()->cannot('update', [User::class, User::findOrFail($id)])) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }

        $user =  User::findOrFail($id);
        return view('user.create', ['user' => $user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($request->user()->cannot('update', [User::class, User::findOrFail($id)])) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }

        User::findOrFail($id)->update($this->validatedData($request));
        return redirect()->route('users.index')->with('success', 'User information was updated');
                             
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if ($request->user()->cannot('delete', [User::class, User::find($id)])) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        }

        $user = Product::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User was deleted');
    }


    

    private function validatedData($request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        return $validatedData;
    }
}
