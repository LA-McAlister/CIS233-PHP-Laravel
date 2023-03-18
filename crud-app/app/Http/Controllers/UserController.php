<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('view', User::class)) {
            return redirect()->route('products.index')->with('error', 'You do not have permission');
        };

        $users = User::with('reviews'); 
        return view('users.index', ['users' => $users->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('View', User::class)) {
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

        $testUser = $this->validatedData($request);
        $password = $testUser['password']; 
        $hashed = Hash::make($password); 
        $testUser['password'] = $hashed;

        User::create($testUser);
        return redirect()->route('users.index')->with('success', 'User information was added');
    }

    /**
     * Display the specified resource.
     */
    
     public function show($id)
    {

        $user = user::with('reviews')->findOrFail($id);
        return view('users.show', ['user' => $user]);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

        $user =  User::findOrFail($id);
        return view('users.edit', ['user' => $user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        User::findOrFail($id)->update($this->validatedData($request));
        return redirect()->route('users.index')->with('success', 'User information was updated');
                             
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    
        $user = Product::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User was deleted');
    }


    

    private function validatedData($request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        return $validatedData;
    }
}
