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
    'name' => 'sometimes|required|min:3', // 'sometimes' allows for partial updates
    'email' => 'sometimes|required|email',
    'password' => 'nullable|confirmed|min:8',
    'image' => 'nullable|mimes:jpeg,jpg,png',
]);

$user = User::findOrFail($userId);

if (request()->has('password')) {
    $data['password'] = Hash::make(request('password'));
}

if (request()->hasFile('image')) {
    $path = request('image')->store('users');
    $data['image'] = $path; // store only the filename
}

$user->update($data);

return back()->with('success', 'User updated successfully.'); // Adding success message

    }

}
