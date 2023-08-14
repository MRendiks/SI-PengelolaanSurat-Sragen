<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Models\Surat;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as XlsxWriter;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as XlsxReader;

class SpreadsheetController extends Controller
{
    public function get(Request $request){
        //Mengambil userId dan email
        $userId = Auth::id();
        $userName = Auth::user()->name;

        //Membuat konfigurasi tempat penyimpanan file excel
        $fileName = "$userId-$userName.xlsx";
        $path = public_path() . "/storage/" .$fileName;

        //Mengambbil semua activity dari ddatabase berdasarkan userId
        $surat = new Surat();
        $surat = $surat->where('userId', $userId)->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue("A1","Nama");
        $sheet->setCellValue("B1","Pangkalan");
        $sheet->setCellValue("C1","No Telephone");
        $sheet->setCellValue("D1","Jeni Surat");
        $sheet->setCellValue("E1","Keperluan");
        $sheet->setCellValue("F1","Waktu");
        $sheet->setCellValue("G1","Lokasi");
        $sheet->setCellValue("H1","Surat Permohonan");
        $sheet->setCellValue("J1","Progres");

        foreach($surat as $index => $value) {
            $row = 2 + $index;
            $jenis = "";

            if($value->nominal > 0) {
                $jenis ="Pemasukan";
            } else {
                $jenis ="Pengeluaran";
            }
            $sheet->setCellValue("A$row",$value->description);
            $sheet->setCellValue("B$row",$value->nominal);
            $sheet->setCellValue("C$row",$jenis);

        }

        $writter = new XlsxWriter($spreadsheet);
        $writter->save("./storage/".$fileName);
        
        return response()->download($path, $fileName, [
            "Content-Type" => "application/octet-stream"
        
        ]);
    }
    public function store(Request $request){
        $validationData = $request->validate([
            'file' => ['required','mimes:xlsx','file']
        ]);
        $file = $request->file('file');
        $fileName = uniqid() . '-' . $file->getClientOriginalName();
        $file->move('temp', $fileName);

        $reader = new XlsxReader();
        $spreadsheet = $reader->load('./temp/' . $fileName);
        $activities = $spreadsheet->getActiveSheet()->toArray();
        array_shift($activities);
        
        if (count($activities) < 1){
            return back()->withErrors([
                'file' => 'Activity not found'
            ]);
        }

        
        $userId = Auth::id();
        $data = [];

        foreach ($activities as $activity){
            array_push($data, [
                'description' => $activity[0],
                'nominal' => $activity[1],
                'userId' => $userId,
            ]);
        }

       $activity = new Activity();
       $activity->insert($data);

        return redirect('/');
    }
}