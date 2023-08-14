@include('layouts.header')
<br><br><br>
<div class="container">
<div class="row">
    <div class="col-lg-5">
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
    <div class="col-lg-5">
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
<div class="container mt-4 mb-4 ml-5">
  <div class="row">
      <button class="btn btn-success col-lg-10" href="#" data-bs-toggle="modal" data-bs-target="#PengajuanSurat1">
        <i class="ti-power-off text-primary"></i>Ajukan
      </button>
  </div>
</div>
</div>

<div class="card">
  <div class="card-body">
  <center><h1 class="card-title">Tabel Surat</h1></center>                  
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
                                        <th>Preview Surat</th>
                                        <th>Progres</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($data_surat as $item)
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
                                      @if($item->jenis_surat == "Surat Keterangan")
                                        @csrf
                                        @method('get')
                                        <td><a href="/{{$item->id_surat}}/preview_surat2" class="btn btn-primary" target="_blank">Preview Surat</a></td>
                                      @else
                                        <td><a href="/{{$item->id_surat}}/preview_surat1" class="btn btn-primary" target="_blank">Preview Surat</a></td>
                                      @endif
                                      
                                      <td><label class="badge badge-warning">{{ $item->progres }}</label></td>
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

<div class="modal fade" id="PengajuanSurat1" tabindex="-1" role="dialog" aria-labelledby="PengajuanSurat1Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <center><h4 class="modal-title" id="PengajuanSurat1Label">Pengajuan Surat</h4></center>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="/pengajuan" enctype="multipart/form-data" method="POST">
            @csrf
                {{-- <input type="number" name="nama_pengaju" hidden value="{{auth()->user()->name}}">
                <input type="number" name="id_user" hidden value="{{auth()->user()->id}}"> --}}

              <div class="form-group">
                <label for="jenis_surat">Jenis Surat</label>
                <select class="form-select" aria-label="Default select example" id="jenis_surat" name="jenis_surat">
                  <option value="">- SILAHKAN PILIH JENIS SURAT -</option>
                  <option value="Surat Keterangan">Surat Keterangan</option>
                  <option value="Surat Rekomendasi">Surat Rekomendasi</option>
                </select>
              </div>

              
          </form>
      </div>
          <div class="modal-footer">
          </div>
      </div>
  </div>
</div>


<div class="modal fade" id="PengajuanSurat2" tabindex="-1" role="dialog" aria-labelledby="PengajuanSurat1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <center><h4 class="modal-title" id="PengajuanSurat1Label">Pengajuan Surat Keterangan</h4></center>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="/pengajuan" enctype="multipart/form-data" method="POST">
            @csrf
              <div class="form-group">
                <label for="nama_pengaju">Nama User</label>
                <input type="text" name="nama_pengaju" id="nama_pengaju" class="form-control" readonly value="{{auth()->user()->name}}">
                <input type="number" name="nama_pengaju" hidden value="{{auth()->user()->name}}">
                <input type="number" name="id_user" hidden value="{{auth()->user()->id}}">
                <input type="text" name="jenis_surat" hidden value="Surat Keterangan">
              </div>

              <div class="form-group">
                <label for="nama_di_surat">Nama</label>
                <input type="text" name="nama_di_surat" id="nama_di_surat" value="{{$user->nama_di_surat}}" class="form-control" readonly>
                @error('pengakalan')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$massage}}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="tempat">Tempat, Tanggal Lahir</label> 
                <input type="text" name="tempat" id="tempat" value="{{$user->ttl}}" class="form-control" readonly>
                @error('pengakalan')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$massage}}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="pangkalan">Pangkalan</label>
                <input type="text" name="pangkalan" id="pangkalan" value="{{$user->pangkalan}}" class="form-control" readonly>
                @error('pengakalan')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$massage}}</strong>
                    </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="no_tlpn">No Telephon</label>
                <input type="text" name="no_tlpn" id="no_tlpn" value="{{$user->no_tlpn}}" class="form-control" readonly>
                @error('no_tlpn')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$massage}}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="keperluan">keperluan</label>
                <input type="text" name="keperluan" id="keperluan" value="{{old('keperluan')}}" class="form-control">
                @error('keperluan')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$massage}}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="waktu">waktu</label>
                <input type="date" name="waktu" id="waktu" value="{{old('waktu')}}" min="{{$current}}" class="form-control">
                @error('waktu')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$massage}}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" value="{{old('lokasi')}}" class="form-control">
                @error('lokasi')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$massage}}</strong>
                    </span>
                @enderror
              </div>
              
              <div class="form-group">
                <label for="jumlah_peserta">Jumlah Peserta</label>
                <input type="number" name="jumlah_peserta" id="jumlah_peserta" value="{{old('jumlah_peserta')}}" class="form-control">
                @error('jumlah_peserta')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$massage}}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="permohonan">Surat Permohonan</label>
                <div class="col-sm-9">
                  <input type="file" class="form-control" name="permohonan" id="permohonan" accept="application/pdf" value="{{old('permohonan')}}">
                </div>
              </div>

              <center><button class="btn btn-primary col-lg-6" type="submit">Ajukan</button></center>
              
          </form>
      </div>
          <div class="modal-footer">
          </div>
      </div>
  </div>
</div>

<div class="modal fade " id="PengajuanSurat3" tabindex="-1" role="dialog" aria-labelledby="PengajuanSurat1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <center><h4 class="modal-title" id="PengajuanSurat1Label">Pengajuan Surat</h4></center>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
          <form action="/pengajuan" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group">
              <label for="nama_pengaju">Nama User</label>
              <input type="text" name="nama_pengaju" id="nama_pengaju" class="form-control" readonly value="{{auth()->user()->name}}">
              <input type="number" name="nama_pengaju" hidden value="{{auth()->user()->name}}">
              <input type="number" name="id_user" hidden value="{{auth()->user()->id}}">
              <input type="text" name="jenis_surat" hidden value="Surat Rekomendasi">
            </div>

            <div class="form-group">
              <label for="nama_di_surat">Nama</label>
              <input type="text" name="nama_di_surat" id="nama_di_surat" value="{{$user->nama_di_surat}}" class="form-control" readonly>
              @error('pengakalan')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$massage}}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="tempat">Tempat, Tanggal Lahir</label> 
              <input type="text" name="tempat" id="tempat" value="{{$user->ttl}}" class="form-control" readonly>
              @error('pengakalan')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$massage}}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="pangkalan">Pangkalan</label>
              <input type="text" name="pangkalan" id="pangkalan" value="{{$user->pangkalan}}" class="form-control" readonly>
              @error('pengakalan')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$massage}}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="no_tlpn">No Telephon</label>
              <input type="text" name="no_tlpn" id="no_tlpn" value="{{$user->no_tlpn}}" class="form-control" readonly>
              @error('no_tlpn')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$massage}}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="keperluan">keperluan</label>
              <input type="text" name="keperluan" id="keperluan" value="{{old('keperluan')}}" class="form-control">
              @error('keperluan')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$massage}}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="waktu">waktu</label>
              <input type="date" name="waktu" id="waktu" value="{{old('waktu')}}" min="{{$current}}" class="form-control">
              @error('waktu')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$massage}}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="lokasi">Lokasi</label>
              <input type="text" name="lokasi" id="lokasi" value="{{old('lokasi')}}" class="form-control">
              @error('lokasi')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$massage}}</strong>
                  </span>
              @enderror
            </div>
            
            <div class="form-group">
              <label for="jumlah_peserta">Jumlah Peserta</label>
              <input type="number" name="jumlah_peserta" id="jumlah_peserta" value="{{old('jumlah_peserta')}}" class="form-control">
              @error('jumlah_peserta')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$massage}}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="permohonan">Surat Permohonan</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="permohonan" id="permohonan" accept="application/pdf" value="{{old('permohonan')}}">
              </div>
            </div>

              <center><button class="btn btn-primary col-lg-6" type="submit">Ajukan</button></center>
              
          </form>
      </div>
          <div class="modal-footer">
          </div>
      </div>
  </div>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
  $(document).ready(function() {
      // Show the first modal initially
      // $('#PengajuanSurat1').modal('show');
  
      // Handle select option change
      $('#jenis_surat').on('change', function() {
          var selectedOption = $(this).val();
  
          // Hide the current modal
          $('#PengajuanSurat1').modal('hide');
          // console.log(selectedOption);
          // Show the specific modal based on the selected option
          if (selectedOption === 'Surat Keterangan') {
              $('#PengajuanSurat2').modal('show');
          } else if (selectedOption === 'Surat Rekomendasi') {
              $('#PengajuanSurat3').modal('show');
          }
      });
  });
  </script>

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
</html>