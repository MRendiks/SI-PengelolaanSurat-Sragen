@include('layouts.header')
<br><br><br>


@if(session('success'))
<div class="alert alert-success">
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
        });
    </script>
</div>
@endif

@if(session('failed'))
<div class="alert alert-error">
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Failed!',
            text: "{{ session('failed') }}",
        });
    </script>
</div>
@endif
<div class="card">

    <div class="card-body">
    <center><h1 class="card-title">Tabel Kegiatan</h1></center> 
    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahKegiatan">Tambah Kegiatan</a><br><br>                
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
                                        <th>Aksi</th>
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
                                        <td>
                                          <form id="deleteKeg" onclick="confirmDelete()" action="/{{ $item->id_kegiatan }}/delete_kegiatan" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                            delete
                                            </button>
                                          </form>
                                          <script>
                                            function confirmDelete() {
                                                  Swal.fire({
                                                      title: 'Apakah Kamu Yakin menghapus Data ini?',
                                                      text: "Data akan hilang!",
                                                      icon: 'warning',
                                                      showCancelButton: true,
                                                      confirmButtonColor: '#d33',
                                                      cancelButtonColor: '#3085d6',
                                                      confirmButtonText: 'Ya, Hapus!'
                                                  }).then((result) => {
                                                      if (result.isConfirmed) {
                                                          document.getElementById('deleteKeg').submit();
                                                      }
                                                  });
                                                }
                                          </script>
                                            
                                            
                                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateKegiatan{{$item->id_kegiatan}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            edit</a>
                                            
                                          
                                            </td>
                                          @if ($item->status === "Terlaksana")
                                          <td><label class="badge badge-success">{{$item->status}}</label></td>
                                          @endif
                                          @if($item->status === "Segera")
                                          <td><label class="badge badge-warning">{{$item->status}}</label></td>
                                          @endif
                                          @if($item->status === "Tidak Terlaksana")
                                          <td><label class="badge badge-danger">{{$item->status}}</label></td>
                                          @endif
                                          

                                            {{-- <ul class="navbar-nav ms-auto">
                                            <li class="nav-item nav-profile dropdown">
                                                <div class="dropdown">
                                                  <a class="nav-link dropdown-toggle" style="text-decoration: none; color: white;" id="dropdownMenuButton2"  data-bs-toggle="dropdown" aria-expanded="false" >{{$item->status}}</a>
                                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <li>
                                                      <a class="dropdown-item" href="/surat_admin">
                                                        <i class="ti-power-off text-primary"></i>
                                                        Terlaksana
                                                      </a>
                                                  </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <i class="ti-power-off text-primary"></i>
                                                        Tidak Terlaksana
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <i class="ti-power-off text-primary"></i>
                                                        Segera
                                                        </a>
                                                    </li>
                                                  </ul>
                                                </div>
                                            </li>
                                            </ul> --}}

                                        
                                        {{-- </td> --}}
                                    </tr>

                                    
                            <div class="modal fade" id="updateKegiatan{{$item->id_kegiatan}}" tabindex="-1" role="dialog" aria-labelledby="updateKegiatanLabel" aria-hidden="true">
                              <div class="modal-dialog " role="document">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                      <center><h4 class="modal-title" id="updateKegiatanLabel">Update Kegiatan</h4></center>
                                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="/{{ $item->id_kegiatan }}/update_kegiatan" method="POST">
                                        @csrf
                                        @method('PUT')
                                          <div class="form-group">
                                            <label for="nama_kegiatan">Nama Kegiatan</label>
                                            <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="{{$item->nama_kegiatan}}">
                                          </div>

                                          <div class="form-group">
                                            <label for="tgl">Tanggal Pelaksanaan</label>
                                            <input type="date" name="tgl" id="tgl" value="{{$item->tgl}}" class="form-control">
                                            @error('pengakalan')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{massage}}</strong>
                                                </span>
                                            @enderror
                                          </div>

                                          <div class="form-group">
                                            <label for="tempat">Tempat</label> 
                                            <input type="text" name="tempat" id="tempat" value="{{$item->tempat}}" class="form-control">
                                            @error('pengakalan')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{massage}}</strong>
                                                </span>
                                            @enderror
                                          </div>

                                          <div class="form-group">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" name="deskripsi" id="deskripsi" value="{{$item->deskripsi}}" class="form-control">
                                            @error('pengakalan')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{massage}}</strong>
                                                </span>
                                            @enderror
                                          </div>

                                          <div class="form-group">
                                            <label for="status">Terlaksana</label>
                                            <select class="form-select" aria-label="Default select example" name="status">
                                            <option value="Terlaksana">Terlaksana</option>
                                            <option value="Tidak Terlaksana">Tidak Terlaksana</option>
                                            <option value="Segera">Segera</option>
                                            </select>
                                          </div>
                                          <center><button class="btn btn-primary col-lg-6" type="submit">Update</button></center>
                                          
                                      </form>
                                  </div>
                                      <div class="modal-footer">
                                          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                      </div>
                                  </div>
                              </div>
                            </div>

                                    @endforeach
                                    </tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
    </div>
</div>


<div class="modal fade" id="tambahKegiatan" tabindex="-1" role="dialog" aria-labelledby="tambahKegiatanLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <center><h4 class="modal-title" id="tambahKegiatanLabel">Tambah Kegiatan</h4></center>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/tambah_kegiatan" method="POST">
              @csrf
                <div class="form-group">
                  <label for="nama_kegiatan">Nama Kegiatan</label>
                  <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="{{old('nama_kegiatan')}}">
                </div>
  
                <div class="form-group">
                  <label for="tgl">Tanggal Pelaksanaan</label>
                  <input type="date" name="tgl" id="tgl" value="{{old('tgl')}}" class="form-control">
                  @error('pengakalan')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{massage}}</strong>
                      </span>
                  @enderror
                </div>
  
                <div class="form-group">
                  <label for="tempat">Tempat</label> 
                  <input type="text" name="tempat" id="tempat" value="{{old('tempat')}}" class="form-control">
                  @error('pengakalan')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{massage}}</strong>
                      </span>
                  @enderror
                </div>
  
                <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="text" name="deskripsi" id="deskripsi" value="{{old('deskripsi')}}" class="form-control">
                  @error('pengakalan')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{massage}}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="status">Terlaksana</label>
                  <select class="form-select" aria-label="Default select example" name="status">
                  <option value="Terlaksana">Terlaksana</option>
                  <option value="Tidak Terlaksana">Tidak Terlaksana</option>
                  <option value="Segera">Segera</option>
                  </select>
                </div>
                <center><button class="btn btn-primary col-lg-6" type="submit">Tambah</button></center>
                
            </form>
        </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            </div>
        </div>
    </div>
  </div>
  
@include('layouts.footer')