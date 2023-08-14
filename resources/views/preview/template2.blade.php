<!doctype html>
<html lang="en">
<head>
    <title>template</title>
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
<body>
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
    <div style="text-align: center;">
        <b>
            <u style=" font-size: 20px">
                SURAT KETERANGAN
            </u>
            <br style="font-size: 15px">
            Nomor: SK/{{$data->id_surat}}
        </b>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    Yang Bertandatangan dibawah ini:
    <br>
    Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Drs. Suwardi, M.M.
    <br>
    Jabatan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Ketua  Gerakan Pramuka Kwartir Cabang Sragen
    <br>
    NTA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 11140001234
    <br>
    <br>
    Dengan ini menerangkan bahwa:
    <br>
    Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <b>{{$data->nama}}</b>
    <br>
    Tempat, Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$data->ttl}}
    <br>
    Gugus Depan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
    <br>
    Dengan ini menerangkan bahwa kakak tersebut <b>AKTIF</b> sebagai Anggota Gerakan Pramuka di Gugus depan tersebut dan mengikuti kegiatan Kepramukaan secara rutin.
    <br>
    <br>
    Demikian surat rekomendasi ini dibuat untuk dipergunakan sebagaimanamestinya.
    <br>
    <br>
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