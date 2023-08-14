@include('layouts.header')
<br><br><br>


<div class="card">
  <div class="card-body">
    <center><h1 class="card-title">Tabel Surat</h1></center> 
      <p class="card-description">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   
        </div>
                  </p>
                  
        <div class="row">   
            <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formModalLabel">Form Pengajuan Surat</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/input" method="post" enctype="multipart/form-surat">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input class="form-control" type="text" id="input-nama" name="nama" value="{{ old('nama') }}">
                                </div>
                                <div class="form-group">
                                    <label for="pangkalan">Pangkalan</label>
                                    <input class="form-control" type="text" id="input-pangkalan" name="pangkalan" value="{{ old('pangkalan') }}">
                                </div>
                                <div class="form-group">
                                    <label for="no_tlpn">Telephone</label>
                                    <input class="form-control" type="text" id="input-no_tlpn" name="no_tlpn" value="{{ old('no_tlpn') }}">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_surat">Jenis Surat</label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_surat">
                                    <option selected id="input-jenis_surat" value="Surat Keterangan">Surat Keterangan</option>
                                    <option selected id="input-jenis_surat" value="Surat Rekomendasi">Surat Rekomendasi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label>
                                    <input class="form-control" id="input-keperluan" type="text" name="keperluan" value="{{ old('keperluan') }}">
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input class="form-control" id="input-waktu" type="date" name="waktu" value="{{ old('waktu') }}">
                                </div>                                
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input class="form-control" id="input-lokasi" type="text" name="lokasi" value="{{ old('lokasi') }}">
                                </div>
                                <div class="input-group">
                                  <label for="permohonan">Surat Permohonan</label><br>
                                </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="permohonan" id="input-permohonan" value="ada">
                                      <label class="form-check-label" for="permohonan">ada</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="permohonan" id="input-permohonan" value="tidak ada">
                                      <label class="form-check-label" for="permohonan">tidak ada</label>
                                    </div>
                                <br>
                                    <div class="surat-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="surat">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Pop Up -->
                  <table class="table table-dark table-sm table-bordered">
                      <div class="page-content page-container" id="page-content">
                          <div class="padding">
                              <div class="row container d-flex justify-content-center">
                                <div class="col-lg-8 grid-margin stretch-card">
                                    <thead>
                                      <tr>
                                        <th>Id</th>
                                        <th>Nama User</th>
                                        <th>Nama Di Surat</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Pangkalan</th>
                                        <th>No Telephone</th>
                                        <th>Jenis Surat</th>
                                        <th>Keperluan</th>
                                        <th>Waktu</th>
                                        <th>Lokasi</th>
                                        <th>File Permohonan</th>
                                        <th>Progress</th>
                                        <th>Aksi</th>
                                        <th>Cetak</th>
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
                                        <td><a href="/{{ $item->permohonan }}/pdf" class="btn btn-primary" target="_blank">File Permohonan</a></td>
                                        <td>
                                            <ul class="navbar-nav ms-auto">
                                            <li class="nav-item nav-profile dropdown">
                                                <div class="dropdown">
                                                  @if ($item->progres === "Diproses")
                                                  <a class="nav-link dropdown-toggle badge badge-danger px-2" style="text-decoration: none; color: white;" id="dropdownMenuButton2"  data-bs-toggle="dropdown" aria-expanded="false" >{{$item->progres}}</a>
                                                  @endif
                                                  @if($item->progres === "Dapat Diambil")
                                                  <a class="nav-link dropdown-toggle badge badge-warning px-2" style="text-decoration: none; color: white;" id="dropdownMenuButton2"  data-bs-toggle="dropdown" aria-expanded="false" >{{$item->progres}}</a>
                                                  @endif
                                                  @if($item->progres === "Sudah Diambil")
                                                  <a class="nav-link dropdown-toggle badge badge-success px-2" style="text-decoration: none; color: white;" id="dropdownMenuButton2"  data-bs-toggle="dropdown" aria-expanded="false" >{{$item->progres}}</a>
                                                  @endif

                                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <li>
                                                      <a class="dropdown-item" href="/surat_admin">
                                                        <i class="ti-power-off text-primary"></i>
                                                        Diproses
                                                      </a>
                                                  </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <i class="ti-power-off text-primary"></i>
                                                        Dapat Diambil
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                        <i class="ti-power-off text-primary"></i>
                                                        Sudah Diambil
                                                        </a>
                                                    </li>
                                                  </ul>
                                                </div>
                                            </li>
                                            </ul>
                                        </td>
                                        <td>
                                          <form id="deleteSur" onclick="confirmDelete()" action="/{{ $item->id_surat }}/delete_surat" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"
                                            class="btn btn-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                            delete
                                            </button>
                                            
                                          </form>
                                          <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateSurat{{$item->id_surat}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            edit</a>

                                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailSurat">
                                              <i class="fa-solid fa-pen-to-square"></i>
                                              Preview</a>
                                            </td>
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
                                                          document.getElementById('deleteSur').submit();
                                                      }
                                                  });
                                                }
                                          </script>
                                          @if($item->jenis_surat == "Surat Keterangan")
                                          @csrf
                                          @method('get')
                                          <td><a href="/cetak_surat1/{{$item->id_surat}}" class="btn btn-primary" target="_blank">Cetak Surat</a></td>
                                          @else
                                            <td><a href="/cetak_surat2/{{$item->id_surat}}" class="btn btn-primary" target="_blank">cetak Surat</a></td>
                                          @endif
                                      </tr>
                                      <div class="modal fade" id="detailSurat" tabindex="-1" role="dialog" aria-labelledby="detailSuratLabel" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <center><h4 class="modal-title" id="detailSuratLabel">Detail Surat</h4></center>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#">
                                                                  
                                                    <div class="form-group">
                                                      <label for="pangkalan">Pangkalan</label>
                                                      <input type="text" class="form-control" readonly value="{{$item->pangkalan}}">
                                                      @error('pengakalan')
                                                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{massage}}</strong>
                                                          </span>
                                                      @enderror
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="no_tlpn">No Telephon</label>
                                                      <input type="text" class="form-control" readonly value="{{$item->no_tlpn}}">
                                                      @error('no_tlpn')
                                                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{massage}}</strong>
                                                          </span>
                                                      @enderror
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="jenis_surat">Jenis Surat</label>
                                                      <input type="text" class="form-control" readonly value="{{$item->jenis_surat}}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="keperluan">keperluan</label>
                                                      <input type="text" class="form-control" readonly value="{{$item->keperluan}}">
                                                      @error('keperluan')
                                                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{massage}}</strong>
                                                          </span>
                                                      @enderror
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="waktu">waktu</label>
                                                      <input type="date" class="form-control" readonly value="{{$item->waktu}}">
                                                      @error('waktu')
                                                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{massage}}</strong>
                                                          </span>
                                                      @enderror
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="lokasi">Lokasi</label>
                                                      <input type="text" class="form-control" readonly value="{{$item->lokasi}}">
                                                      @error('lokasi')
                                                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{massage}}</strong>
                                                          </span>
                                                      @enderror
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                      <label for="jumlah_peserta">Jumlah Peserta</label>
                                                      <input type="number" class="form-control" readonly value="{{$item->jumlah_peserta}}">
                                                      @error('jumlah_peserta')
                                                          <span class="invalid-feedback" role="alert">
                                                            <strong>{{massage}}</strong>
                                                          </span>
                                                      @enderror
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                      </div>

                                      <div class="modal fade" id="updateSurat{{$item->id_surat}}" tabindex="-1" role="dialog" aria-labelledby="updateSuratLabel" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <center><h4 class="modal-title" id="updateSuratLabel">Update Kegiatan</h4></center>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/{{ $item->id_surat }}/update_surat" method="POST">
                                                  @csrf
                                                  @method('PUT')
                                                  <div class="form-group">
                                                    <label for="nama_di_surat">Nama</label>
                                                    <input type="text" id="nama_di_surat" value="{{$item->nama_di_surat}}" class="form-control" readonly>
                                                    @error('pengakalan')
                                                        <span class="invalid-feedback" role="alert">
                                                          <strong>{{massage}}</strong>
                                                        </span>
                                                    @enderror
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="pangkalan">Pangkalan</label>
                                                    <input type="text"  id="pangkalan" value="{{$item->pangkalan}}" class="form-control" readonly>
                                                    @error('pengakalan')
                                                        <span class="invalid-feedback" role="alert">
                                                          <strong>{{massage}}</strong>
                                                        </span>
                                                    @enderror
                                                  </div>
                                    
                                                  <div class="form-group">
                                                    <label for="no_tlpn">No Telephon</label>
                                                    <input type="text" id="no_tlpn" value="{{$item->no_tlpn}}" class="form-control" readonly>
                                                    @error('no_tlpn')
                                                        <span class="invalid-feedback" role="alert">
                                                          <strong>{{massage}}</strong>
                                                        </span>
                                                    @enderror
                                                  </div>
                                    
                                                  <div class="form-group">
                                                    <label for="jenis_surat">Jenis Surat</label>
                                                    <select class="form-select" aria-label="Default select example" name="jenis_surat">
                                                    <option value="Surat Keterangan">Surat Keterangan</option>
                                                    <option value="Surat Rekomendasi">Surat Rekomendasi</option>
                                                    </select>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="keperluan">keperluan</label>
                                                    <input type="text" name="keperluan" id="keperluan" value="{{$item->keperluan }}" class="form-control">
                                                    @error('keperluan')
                                                        <span class="invalid-feedback" role="alert">
                                                          <strong>{{massage}}</strong>
                                                        </span>
                                                    @enderror
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="waktu">waktu</label>
                                                    <input type="date" name="waktu" id="waktu" value="{{$item->waktu}}" class="form-control">
                                                    @error('waktu')
                                                        <span class="invalid-feedback" role="alert">
                                                          <strong>{{massage}}</strong>
                                                        </span>
                                                    @enderror
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="lokasi">Lokasi</label>
                                                    <input type="text" name="lokasi" id="lokasi" value="{{$item->lokasi}}" class="form-control">
                                                    @error('lokasi')
                                                        <span class="invalid-feedback" role="alert">
                                                          <strong>{{massage}}</strong>
                                                        </span>
                                                    @enderror
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                    <label for="jumlah_peserta">Jumlah Peserta</label>
                                                    <input type="number" name="jumlah_peserta" id="jumlah_peserta" value="{{$item->jumlah_peserta}}" class="form-control">
                                                    @error('jumlah_peserta')
                                                        <span class="invalid-feedback" role="alert">
                                                          <strong>{{massage}}</strong>
                                                        </span>
                                                    @enderror
                                                  </div>

                                                  <div class="form-group">
                                                    <label for="progres">Progress</label>
                                                    <select class="form-select" aria-label="Default select example" name="progres">
                                                    <option {{ $item->progres == 'Diproses' ? 'selected' : '' }} value="Diproses">Diproses</option>
                                                    <option {{ $item->progres == 'Dapat Diambil' ? 'selected' : '' }} value="Dapat Diambil">Dapat Diambil</option>
                                                    <option {{ $item->progres == 'Sudah Diambil' ? 'selected' : '' }} value="Sudah Diambil">Sudah Diambil</option>
                                                    </select>
                                                  </div>
                                                  <center><button class="btn btn-primary col-lg-6" type="submit">Update</button></center>
                                                  
                                                    
                                                </form>
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
                      {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end" >
                            <a href="/export">
                      Export Excel</a>
                      </div> --}}
  </div>
</div>
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
@include('layouts.footer')