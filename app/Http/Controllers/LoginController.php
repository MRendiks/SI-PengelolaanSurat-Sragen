<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {

        return view('login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function attempt(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $email = $credentials['email'];
        $password = $credentials['password'];

        $user = User::where('email', '=', $email)->first();
        if ($user === null) {
            return redirect('/login')->withErrors([
                'auth'=>'Email or password is not found']);
        }

        Auth::attempt([
            'email'=> $email,
            'password' => $password
        ]);
        
        
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'Login Berhasil');
        }else{
            return redirect('login')->with('failed', 'Login Gagal, Cek email dan password anda');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/')->with('logout', 'Logout Berhasil');
    }
}
