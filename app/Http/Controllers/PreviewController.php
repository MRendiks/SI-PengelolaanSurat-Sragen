<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class PreviewController extends Controller
{
    public function preview_1($id)
    {
        $data = Surat::find($id);
        return view('preview.template', compact('data'));
    }

    public function preview_2($id)
    {
        $data = Surat::find($id);
        return view('preview.template2', compact('data'));
    }
}
