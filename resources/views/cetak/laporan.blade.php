<!doctype html>
<html lang="en">
<head>
    <title>Laporan Surat</title>
</head>
<style type="text/css">
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 10mm;
        margin: 5mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        border: 2px white solid;
        height: 257mm;
        outline: 5mm white solid;
    }
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}">
<body>
    <script>
            window.onload = function() {
                window.print();
            };
    </script>
<div class="book">
<div class="page">
<div class="subpage">
    <img src="{{asset('img/tunas.png')}}" style="width: 90px; float: left;">
    <img src="{{asset('img/wosm.png')}}" style="width: 105px; float: right;">
    <b style="margin-top: 20px ">
         <div style="text-align: center; font-size: 30px;line-height: 30px; margin-top: 10px">
            GERAKAN PRAMUKA
            <br>KWARTIR CABANG SRAGEN
        </div>
        <div style="text-align: center; font-size: 15px; line-height: 15px; margin-bottom: 10px">
            Jl. Hasanudin No. 2, Kroyo, Karangmalang, Sragen 57291
            <br>Telp. (0271) 890868, E-mail : kwarcab.sragen@gmail.com
        </div>
    </b>
    <hr size="10px" width="100%" color="black"style="line-height: 5px"> 
    <hr size="2px" width="100%" color="black"><p>
    
<div class="card" >
    <div class="card-body" >
    <center><h1 class="card-title">Laporan Daftar Surat</h1></center>                  
                <table class="table table-dark table-sm table-bordered" width="600px">
                    <div class="page-content page-container"  id="page-content">
                        <div class="padding">
                            <div class="row container d-flex justify-content-center">
                                <div class="col-lg-8 grid-margin stretch-card">
                                    <thead >
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Pemohon</th>
                                        <th>Nama Tertera</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Pangkalan</th>
                                        <th>No Telephone</th>
                                        <th>Jenis Surat</th>
                                        <th>Keperluan</th>
                                        <th>Waktu</th>
                                        <th>Lokasi</th>
        
                                        <th>Progress</th> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($surat as $item)
                                    <tr>
                                    <td>{{ $item->id_surat }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->nama_di_surat }}</td>
                                        <td>{{ $item->ttl }}</td>
                                        <td>{{ $item->pangkalan }}</td>
                                        <td>{{ $item->no_tlpn }}</td>
                                        <td>{{ $item->jenis_surat }}</td>
                                        <td>{{ $item->keperluan }}</td>
                                        <td>{{ $item->waktu }}</td>
                                        <td>{{ $item->lokasi }}</td>
                                        <td>{{ $item->progres }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
    </div>
</div>
<br>
    Sragen, {{Carbon\Carbon::now()->toDateString()}}
    <br>
    <b>
    <br style="font-size: 15px">
        GERAKAN PRAMUKA
        <br>
        KWARTIR CABANG SRAGEN
        <br>
        Ketua,
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        Drs. SUWARDI, M.M.<br>
        NTA. 11140001234
    </b>
</div>
</div>
</div>
</body>

</html>