<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/kegiatan.css">
    <link rel="stylesheet" href="/css/layout.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Dashboard</title>
    <style>
    </style>
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}">
    {{-- <link href = {{ asset("bootstrap/css/bootstrap.css") }} rel="stylesheet" /> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://github.com/pipwerks/PDFObject/blob/master/pdfobject.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
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
          <a class="nav-link" href="/dashboard">Home</a>
        </li>
        @if (auth()->user()->level=="admin")
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.data_user')}}">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/kegiatan_admin">Kegiatan</a>
        </li>
        
        <li class="nav-item nav-profile dropdown">
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" id="dropdownMenuButton2"  data-bs-toggle="dropdown" aria-expanded="false" >Surat</a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
              <li>
                <a class="dropdown-item" href="/surat_admin">
                  <i class="ti-power-off text-primary"></i>
                  Cetak
                </a>
            </li>
              <li>
                <a class="dropdown-item" href="#">
                <i class="ti-power-off text-primary"></i>
                Pengambilan
              </a>
              </li>
            </ul>
          </div>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/kegiatan">Kegiatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/surat">Surat</a>
        </li>
        @endif
        <li class="nav-item nav-profile dropdown">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path 
                  fill-rule="evenodd" 
                  d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                  <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                      <i class="ti-power-off text-primary"></i>Profile
                  </a>
              </li>
                <li>
                  <a class="dropdown-item" href="/logout">
                  <i class="ti-power-off text-primary"></i>
                  Logout
                </a>
                </li>
              </ul>
            </div>
          </li>
      </ul>
    </div>
  </div>
</nav>

@isset($message)
<div class="alert alert-success">
<strong>{{message}}</strong>
</div>
@endif

<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="profileModalLabel">Detail Profile</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form>
              <div class="form-group">
                  <label for="username_admin">Username</label>
                  <input type="text" name="username_admin" id="username_admin" class="form-control" readonly value="{{auth()->user()->name}}">
              </div>
              <div class="form-group">
                  <label for="email_admin">Email</label>
                  <input type="email" name="email_admin" id="email_admin" class="form-control" readonly value="{{auth()->user()->email}}">
              </div>
          </form>
      </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>