<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $value = session('page');
        // $value = session('page', 'kegiatan');
        // session(['page' => 'kegiatan']);

        $kegiatan = Kegiatan::orderBy("id_kegiatan")->get();
        
        return view('pengguna.kegiatan', compact('kegiatan'));
    }

    public function index_admin()
    {
        $kegiatan = Kegiatan::orderBy("id_kegiatan")->get();
        
        return view('admin.kegiatan', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tgl' => 'required|date',
            'tempat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required'
        ]);

        $kegiatan = new Kegiatan;
        $kegiatan->nama_kegiatan = $validateData['nama_kegiatan'];
        $kegiatan->tgl = $validateData['tgl'];
        $kegiatan->tempat = $validateData['tempat'];
        $kegiatan->deskripsi = $validateData['deskripsi'];
        $kegiatan->status = $validateData['status'];
        $kegiatan->save();
        $massage = "Kegiatan Berhasil Di ajukan";
        return redirect()->route('kegiatan_admin')->with('success', $massage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->update($request->except(['_token', 'submit']));
        $massage = "Kegiatan Berhasil Di Update";
        return redirect()->route('kegiatan_admin')->with('success', $massage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);

        $kegiatan->delete();

        $massage = "Kegiatan Berhasil Di Hapus";
        return redirect()->route('kegiatan_admin')->with('success', $massage);
    }
}
