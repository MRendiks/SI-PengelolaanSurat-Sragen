@include('layouts.header')
<br><br><br>



<div class="card">

    <div class="card-body">
    <center><h1 class="card-title">Tabel User</h1></center> 
    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUser">Tambah User</a><br><br>                
                <table class="table table-dark table-sm table-bordered">
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row container d-flex justify-content-center">
                                <div class="col-lg-8 grid-margin stretch-card">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Nama Untuk Surat</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>Pangkalan</th>
                                        <th>Nomor Telephon</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->nama_di_surat }}</td>
                                        <td>{{ $item->ttl }}</td>
                                        <td>{{ $item->pangkalan}}</td>
                                        <td> {{$item->no_tlpn}} </td>
                                        <td>
                                          <form id="deleteKeg" onclick="confirm('Apakah Anda yakin hapus data ini?')" action="/{{ $item->id }}/delete_user" method="POST">
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
                                            
                                            
                                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateUser{{$item->id}}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            edit</a>
                                            
                                            </td>
                                          
                                    </tr>

                                    
                            <div class="modal fade" id="updateUser{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="updateUserLabel" aria-hidden="true">
                              <div class="modal-dialog " role="document">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                      <center><h4 class="modal-title" id="updateUserLabel">Update User</h4></center>
                                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <form action="/{{ $item->id }}/update_user" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <div class="mb-4">
                                              <label for="input-name" class="form-label">Nama</label>
                                              <input type="text" class="form-control" id="input-name" name="name" value="{{$item->name}}" />
                                              @error('name')
                                              <small class="text-danger mt-2">{{ $message }}</small>
                                              @enderror
                                          </div>
                                          <div class="mb-4">
                                              <label for="input-email" class="form-label">Email</label>
                                              <input type="email" class="form-control" id="input-email" name="email" value="{{$item->email}}" />
                                              @error('email')
                                              <small class="text-danger mt-2">{{ $message }}</small>
                                              @enderror
                                          </div>
                                          <div class="mb-4">
                                              <label for="input-nama_di_surat" class="form-label">Nama Di Surat</label>
                                              <input type="text" class="form-control" id="input-nama_di_surat" value="{{$item->nama_di_surat}}" name="nama_di_surat" />
                                              @error('nama_di_surat')
                                              <small class="text-danger mt-2">{{ $message }}</small>
                                              @enderror
                                          </div>
                                          <div class="mb-4">
                                              <label for="input-tempat" class="form-label">Tempat</label>
                                              <input type="text" class="form-control" id="input-tempat" value="Sragen" />
                                              @error('tempat')
                                              <small class="text-danger mt-2">{{ $message }}</small>
                                              @enderror
                                          </div>
                                          <div class="mb-4">
                                              <label for="input-tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                              <input type="date" class="form-control" max="{{$value}}" value="{{$value}}" id="input-tanggal_lahir" />
                                              @error('tanggal_lahir')
                                              <small class="text-danger mt-2">{{ $message }}</small>
                                              @enderror
                                          </div>
                                          <div class="mb-4">
                                              <label for="input-pangkalan" class="form-label">pangkalan</label>
                                              <input type="text" class="form-control" id="input-pangkalan" name="pangkalan" value="{{$item->pangkalan}}""  />
                                              @error('pangkalan')
                                              <small class="text-danger mt-2">{{ $message }}</small>
                                              @enderror
                                          </div>
                                          <div class="mb-4">
                                              <label for="input-no_tlpn" class="form-label">Nomor Telephon</label>
                                              <input type="number" class="form-control" id="input-no_tlpn" name="no_tlpn" value="{{$item->no_tlpn}}"" />
                                              @error('no_tlpn')
                                              <small class="text-danger mt-2">{{ $message }}</small>
                                              @enderror
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


<div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="tambahUserLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <center><h4 class="modal-title" id="tambahUserLabel">Tambah User</h4></center>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.add_user')}}" method="POST">
              @csrf
              <div class="mb-4">
                <label for="input-name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="input-name" name="name" value="{{ old('name') }}" />
                @error('name')
                <small class="text-danger mt-2">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="input-email" class="form-label">Email</label>
                <input type="email" class="form-control" id="input-email" name="email" value="{{ old('email') }}" />
                @error('email')
                <small class="text-danger mt-2">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="input-password" class="form-label">Password</label>
                <input type="password" class="form-control" id="input-password" name="password" />
                @error('password')
                <small class="text-danger mt-2">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="input-nama_di_surat" class="form-label">Nama Di Surat</label>
                <input type="text" class="form-control" id="input-nama_di_surat" name="nama_di_surat" />
                @error('nama_di_surat')
                <small class="text-danger mt-2">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="input-tempat" class="form-label">Tempat</label>
                <input type="text" class="form-control" id="input-tempat" name="tempat" />
                @error('tempat')
                <small class="text-danger mt-2">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="input-tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" max="{{$value}}" id="input-tanggal_lahir" name="tanggal_lahir" />
                @error('tanggal_lahir')
                <small class="text-danger mt-2">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="input-pangkalan" class="form-label">pangkalan</label>
                <input type="text" class="form-control" id="input-pangkalan" name="pangkalan" />
                @error('pangkalan')
                <small class="text-danger mt-2">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-4">
                <label for="input-no_tlpn" class="form-label">Nomor Telephon</label>
                <input type="number" class="form-control" id="input-no_tlpn" name="no_tlpn" />
                @error('no_tlpn')
                <small class="text-danger mt-2">{{ $message }}</small>
                @enderror
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