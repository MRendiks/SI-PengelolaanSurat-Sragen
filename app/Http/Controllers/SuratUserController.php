<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SuratUserController extends Controller
{
    
    public function index()
    {
        $userId     = getAuthenticatedUserId();
        $surat = Surat::get();
        $user = User::where('level', 'user')
        ->where('id', '=', $userId)->first();
        $data_surat = Surat::select('surat.*', 'users.*')
        ->join('users', 'users.id', '=', 'surat.userId')
        ->get();
        $value = Carbon::now();
        $value = $value->subYears(7);
        $value = $value->toDateString();
        
        $current = Carbon::now();
        $current = $current->toDateString();

        // dd($user->nama_di_surat);
        return view ('pengguna.surat', compact('data_surat','surat', 'user', 'current', 'value'));
    }

    public function store(Request $request)
    {
        $surat = new Surat;
        if ($request->hasFile('permohonan')) {
            $file= $request->file('permohonan');
            $ext = $request->file('permohonan')->getClientOriginalExtension();
            $filename = $request->nama_pengaju . 'permohonan' . rand(1, 10000) . '.' . $ext;
            $file->move('surat_file/', $filename);

            // $ttl = $request->tempat. '/' . $request->tanggal_lahir;

            $surat->id_surat = $request->id_surat;
            $surat->userId = $request->id_user;
            // $surat->nama = $request->nama_di_surat;
            // $surat->ttl = $ttl;
            // $surat->pangkalan = $request->pangkalan;
            // $surat->no_tlpn = str($request->no_tlpn);
            $surat->jenis_surat = $request->jenis_surat;
            $surat->keperluan = $request->keperluan;
            $surat->waktu = $request->waktu;
            $surat->lokasi = $request->lokasi;
            $surat->jumlah_peserta = $request->jumlah_peserta;
            $surat->permohonan = $filename;
            $surat->progres = "Diproses";
            $surat->save();
            $massage = "Surat Berhasil Di ajukan";
            return redirect()->route('surat')->with('success', $massage);
        }
        else{
            $massage = "Surat Tidak Berhasil Di ajukan";
            return redirect()->back()->with('failed', $massage);
        }

        
    }

    public function preview_pdf(Request $request, $Filename)
    {
        $filename = $Filename;
        return response()->file(public_path('surat_file/'.$filename));
    }
}
