<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SuratController extends Controller
{
    public function index()
    {
        // $surat = surat::get();
        $surat = Surat::select('surat.*', 'users.*')
        	->join('users', 'users.id', '=', 'surat.userId')
        	->get();
        // dd($surat);
        return view ('admin.surat',['surat' => $surat]);
    }

    public function input()
    {

        return view('surat');
    }
    
    public function store(Request $request)
    {
        $surat = new Surat;

        $surat->id_surat = $request->id_surat;
        $surat->userId = $request->nama;
        $surat->pangkalan = $request->pangkalan;
        $surat->no_tlpn = $request->no_tlpn;
        $surat->jenis_surat = $request->jenis_surat;
        $surat->keperluan = $request->keperluan;
        $surat->waktu = $request->waktu;
        $surat->lokasi = $request->lokasi;
        $surat->permohonan = $request->permohonan;
        $surat->progres = $request->progres;

        $surat->save();
        return  redirect('surat');
    }

    public function edit($id)
    {

        $surat = Surat::find($id);
        $user = User::find($surat->userId);
        return view('admin.editsurat', compact('surat', 'user'));
    }


    public function update($id, Request $request)
    {
        $surat = Surat::find($id);
        $surat->update($request->except(['_token', 'submit']));
        if ($request->progres == "Dapat Diambil") {
            $data = [
                'subject' => 'Surat Keterangan Kwartir',
                'body' => 'Surat Anda Dapat diambil'
            ];
            try
            {
                Mail::to('muh.rendi2001@gmail.com')->send(new MailNotify());

                $massage = "surat Berhasil Di Update";
                return redirect()->route('surat_admin')->with('success', $massage);
            }catch(Exception $th)
            {
                $massage = "surat Berhasil Di Update";
                return redirect()->route('surat_admin')->with('failed', $massage);
            }
        }
        $massage = "surat Berhasil Di Update";
        return redirect()->route('surat_admin')->with('success', $massage);
        
    }

    public function destroy($id)
    {
        $surat = Surat::find($id);

        $surat->delete();

        $massage = "surat Berhasil Di Hapus";
        return redirect()->route('surat_admin')->with('success', $massage);
    }


}

