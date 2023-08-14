@include('layouts.header')
<br><br><br>

<article class="col-md-12">
    <div class="cards-2 section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-image">
                            <a href="#"> <img class="img img-raised" src="https://pramuka-kotabandung.or.id/wp-content/uploads/2022/10/wosm.png"> </a>
                            <div class="ripple-cont"></div>
                        </div>
                        <div class="table">
                            <h6 class="category text-info">Jota Joti 2022</h6>
                            <h4 class="card-caption">
                                    <a href="#">JOTA-JOTI Kwartir Cabang Sragen 2022</a>
                                </h4>
                            <p class="card-description"> Kwartir Cabang Sragen telah melaksanakan kegiatan Jamboree On The Air Jamboree On The Internet (JOTA-JOTI). 
                              Kegiatan ini dilaksanakan pada tanggal 14 s.d tanggal 16 Oktober Tahun 2022 di 2 tempat yang berbeda, 
                              yaitu di Stasiun ORARI Kabupaten Sragen untuk JOTA dan SMK Negeri 1 Sragen untuk JOTI. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-image">
                            <a href="#"> <img class="img img-raised" src="https://gemarkerja.sragenkab.go.id/v2/img/berita/20220523075209.jpg"> </a>
                        </div>
                        <div class="table">
                            <h6 class="category text-info">LABS 2022</h6>
                            <h4 class="card-caption">
                                    <a href="#">Lintas Alam Bumi Sukowati IX Tahun 2022</a>
                                </h4>
                            <p class="card-description"> Kegiatan diawali dengan Upacara Pembukaan LABS IX yang dihadiri serta dibuka langsung oleh kak Yuni selaku 
                              Kamabicab Sragen di titik start yaitu Museum Sangiran, Klaster Ngebung, Kecamatan Kalijambe, Sragen.
                              Peserta kemudian diberangkatkan langsung oleh Kak Yuni dari Museum Sangiran Klaster Ngebung menuju transit 1 yaitu Lapangan Desa Jenalas, 
                              Kecamatan Gemolong dengan melalui pos-pos untuk mengikuti 3 rumpun perlombaan yang dilaksanakan pada hari pertama. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-image">
                            <a href="#"> <img class="img img-raised" src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2022/10/23/4042849770.jpg"> </a>
                        </div>
                        <div class="table">
                            <h6 class="category text-info">Peransaka 2022</h6>
                            <h4 class="card-caption">
                                    <a href="#">Perkemahan Antar Satuan Karya Pramuka (PERANSAKA) Ke VIII Kwartir Daerah Jawa Tengah Tahun 2022</a>
                                </h4>
                            <p class="card-description"> Dewan Kerja Cabang Sragen meraih penghargaan DKC Unggul dalam Standarisasi Kegiatan dan 
                              Pengorganisasian Dewan Kerja Cabang Se-Kwartir Daerah Jawa Tengah Tahun 2022. Penghargaan tersebut diberikan bersamaan dengan 
                              Upacara Pembukaan Peransaka Daerah VIII Kwartir Daerah Jawa Tengah Tahun 2022 yang 
                              dilaksanakan pada tanggal 22 s.d 26 Oktober 2022 di Puskepram Candra Birawa, Karanggeneng, Gunungpati, Kota Semarang.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<br><br>

<div class="card">
    <div class="card-body">
    <center><h1 class="card-title">Tabel Kegiatan</h1></center>                  
                <table class="table table-dark table-sm table-bordered">
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row container d-flex justify-content-center">
                                <div class="col-lg-8 grid-margin stretch-card">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Tanggal Pelaksanaan</th>
                                        <th>Tempat</th>
                                        <th>Deskripsi</th>
                                        <th>Terlaksana</th> 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($kegiatan as $item)
                                    <tr>
                                        <td>{{ $item->id_kegiatan }}</td>
                                        <td>{{ $item->nama_kegiatan }}</td>
                                        <td>{{ $item->tgl }}</td>
                                        <td>{{ $item->tempat }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        @if ($item->status == "Terlaksana")
                                        <td><label class="badge badge-success">{{$item->status}}</label></td>
                                        @else
                                        <td><label class="badge badge-warning">{{$item->status}}</label></td>
                                        @endif
                                        

                                        
                                        </td>
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
@include('layouts.footer')