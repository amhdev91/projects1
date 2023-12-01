<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
         
        return view('profile');

    }

    public function update()
    {

        $userId = auth()->id();

$data = request()->validate([
    'name' => ['nullable', 'min:3'],
    'email' => ['nullable', 'email'],
    'password' => ['nullable', 'confirmed', 'min:8'],
    'image' => ['nullable', 'mimes:jpeg,jpg,png'],
]);

if (request()->has('password') && !empty(request('password'))) {
    $data['password'] = Hash::make(request('password'));
  } else {
    unset($data['password']);
  

if (request()->hasFile('image')) {
    $path = request('image')->store('users', 'public');
    $data['image'] = $path;
}

$user = User::findOrFail($userId)->update($data);

// Update user's attributes with the validated data



return back();

    }

}
}
