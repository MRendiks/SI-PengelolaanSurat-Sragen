<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function get()
    {
        return view('register', [
            'title' => 'register',
            'active' => 'register'
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email:rfc,dns'],
            'password' => ['required', 'min:6','max:100']
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('login')->with('success', 'Registration successfull! Please login');
    }
}