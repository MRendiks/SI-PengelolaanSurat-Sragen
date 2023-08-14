@include('layouts.header')
<br><br><br>
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Edit Surat</h4>
      <p class="card-description">
          <form action="" method="post" enctype="multipart/form-surat">
                            @csrf
                            @method('POST')
                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $user->name }}" />
                                @error('nama')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="pangkalan" class="form-label">Pangkalan</label>
                                <input type="text" class="form-control" id="pangkalan" name="pangkalan"
                                value="{{ $surat->pangkalan }}" />
                                @error('pangkalan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="no_tlpn" class="form-label">No Telephone</label>
                                <input type="text" class="form-control" id="no_tlpn" name="no_tlpn"
                                value="{{ $surat->no_tlpn }}" />
                                @error('no_tlpn')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                            <label for="jenis_surat">Jenis Surat</label>
                                    <select class="form-select" aria-label="Default select example" name="jenis_surat">
                                    <option selected id="input-jenis_surat" value="Surat Keterangan">Surat Keterangan</option>
                                    <option selected id="input-jenis_surat" value="Surat Rekomendasi">Surat Rekomendasi</option>
                                    </select>
                                    @error('jenis_surat')
                                        <small class="text-danger mt-2">{{ $message }}</small>
                                    @enderror
                            </div>

                            <div class="mb-4">
                                <label for="keperluan" class="form-label">Keperluan</label>
                                <input type="text" class="form-control" id="keperluan" name="keperluan"
                                value="{{ $surat->keperluan }}" />
                                @error('keperluan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="waktu" class="form-label">Waktu</label>
                                <input type="date" class="form-control" id="waktu" name="waktu"
                                value="{{ $surat->waktu }}" />
                                @error('waktu')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                value="{{ $surat->lokasi }}" />
                                @error('lokasi')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="permohonan" class="form-label">Surat Permohonan:  </label>
                                <input class="form-check-input" type="radio" name="permohonan" id="input-permohonan" value="ada">
                                <label class="form-check-label" for="permohonan">ada</label>
                                <input class="form-check-input" type="radio" name="permohonan" id="input-permohonan" value="tidak ada">
                                <label class="form-check-label" for="permohonan">tidak ada</label>
                                @error('permohonan')
                                    <small class="text-danger mt-2">{{ $message }}</small>
                                @enderror
                            </div>
                                <br>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-info">Ubah</button>
                                </div>
                            </form>
</p>
</div>
</div>
@include('layouts.footer')