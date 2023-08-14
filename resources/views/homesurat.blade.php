<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/layout.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Surat</title>
    <style>
    </style>
    
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</head>
<body style="background-color: #D8CCA3; font-family: Goudy Old Style; font-size: 18px">
<nav class="navbar navbar-expand-lg navbar navbar-light fixed-top" style="background-color: #B09B71; font-family: High Tower Text" >
  <div class="container">
    <a class="navbar-brand" href="/" >
      <img src="https://images.solopos.com/2012/10/logo-pramuka.png?_gl=1*bdf9uq*_ga*MTY1NDU2NTQ4OS4xNjcyNjcyMzQ2*_ga_N48JD3Q0D2*MTY3MjY3MjM0NS4xLjEuMTY3MjY3MjM4OC4xNy4wLjA." alt="" width="30" height="30" class="d-inline-block align-text-top">
      Kwartir Cabang Kota Sragen
    </a>



    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/homekegiatan">Kegiatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/homesurat">Surat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
<div class="container">
<div class="row">
    <div class="col-lg-4">
        <div class="card card-margin">
            <div class="card-header no-border">
                <h5 class="card-title">Surat Keterangan</h5>
            </div>
            <div class="card-body pt-0">
                <div class="widget-49"><span>Surat Keterangan merupakan sebuah surat yang dibuat untuk memberikan keterangan tentang sebuah informasi.<br> Syarat:</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-margin">
            <div class="card-header no-border">
                <h5 class="card-title">Surat Rekomendasi</h5>
            </div>
            <div class="card-body pt-0">
                <div class="widget-49"><span>Surat rekomendasi adalah dokumen yang merekomendasikan seseorang dalam lingkungan profesional.</span>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="/">Home</a></li>
                <li class="list-inline-item"><a href="https://www.google.com/maps?ll=-7.437165,111.022857&z=8&t=m&hl=id&gl=ID&mapclient=embed&cid=4500187227578008112">Location</a></li>
                <li class="list-inline-item"><a href="https://www.instagram.com/dkcsragen/?next=%2F&hl=id">Contact</a></li>
            </ul>
        </footer>
    </div>
</div>
</body>
</html>