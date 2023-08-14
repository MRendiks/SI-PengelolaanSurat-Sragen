<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataUserController extends Controller
{
    public function index()
    {
        $user = User::get()->where('level', 'user');
        // dd($user);
        $value = Carbon::now();
        $value = $value->subYears(7);
        $value = $value->toDateString();
        return view('admin.user', compact('user','value'));
    }

    # ADD
    public function add_user(Request $request)
    {
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

        return redirect()->route('admin.data_user');
    }


    # UPDATE

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->except(['_token', 'submit']));
        $massage = "User Berhasil Di Update";
        return redirect()->route('admin.data_user')->with('success', $massage);
    }

    # DELETE
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        $massage = "user Berhasil Di Hapus";
        return redirect()->route('admin.data_user')->with('success', $massage);
    }
}
