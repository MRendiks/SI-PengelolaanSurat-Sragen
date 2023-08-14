<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function post(Request $request) 
    {
        $validateFile = $request->validate([
            'file' => ['mimes:xlsx', 'max:2048'],
        ]);
    
        $file = $validateFile['file'];
        $file->getClientOriginalName();
        $file->getClientOriginalExtension();
        $file->getRealPath();
        $file->getSize();
        $file->getMimeType();
        $tujuan_import= '/import';
        dd($file);
    }

    public function cetak_1($id)
    {
        $data = Surat::find($id);
        return view('cetak.template', compact('data'));
    }

    public function cetak_2($id)
    {
        $data = Surat::find($id);
        return view('cetak.template2', compact('data'));
    }
}