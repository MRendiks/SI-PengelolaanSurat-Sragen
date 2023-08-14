<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function get()
    {
        $value = Carbon::now();
        $value = $value->subYears(7);
        $value = $value->toDateString();
        
        $maxDate = Carbon::now();
        $maxDate = $maxDate->toDateString();

        return view('register', [
            'title' => 'register',
            'active' => 'register'
        ], compact('value', 'maxDate'));
    }

    public function create(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => ['required', 'max:100'],
        //     'email' => ['required', 'email:rfc,dns'],
        //     'password' => ['required', 'min:6','max:100'],
        // ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $user = new User;
        $password = $request->input('password');
        $password = Hash::make($password);
        $ttl = $request->tempat. ', ' . $request->tanggal_lahir;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $password;
        $user->nama_di_surat = $request->input('nama_di_surat');
        $user->nama_di_surat = $request->input('nama_di_surat');
        $user->ttl = $ttl;
        $user->pangkalan = $request->pangkalan;
        $user->no_tlpn = str($request->no_tlpn);
        $user->level = 'user';
        $user->save();
        // $validatedData['password'] = Hash::make($validatedData['password']);

        // User::create($validatedData);

        return redirect('login')->with('success', 'Registration successfull! Please login');
    }
}