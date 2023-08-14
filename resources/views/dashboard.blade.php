<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@include('layouts.header')

<br><br><br><br>
<div class="card mb-3" style="width: 1255px; left: 46px;">
  <div class="row g-0">
    <div class="col-md-2">
      <img src="https://3.bp.blogspot.com/-qkpPhmq5hcQ/W9Ed6z-80OI/AAAAAAAAApc/IU_qYM6icXgR6nZFzbLzbVFfT7Wc6l7JgCEwYBhgL/s1600/Ketua%2BKwarnas%2BI%2BHamengku%2BBuwono%2BIX.jpg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5 class="card-title">Bapak Pramuka Indonesia, Sri Sultan Hamengku Buwono IX</h5>
        <p class="card-text">Bapak Pramuka Indonesia adalah Sri Sultan Hamengku Buwono IX. Beliau, selain menjadi Sultan Yogyakarta, 
          Wakil Presiden Republik Indonesia, dan Pahlawan Nasional Indonesia, pun dinobatkan sebagai Bapak Pramuka Indonesia. 
          Penobatan Sri Sultan Hamengku Buwono IX sebagai Bapak Pramuka Indonesia layak mengingat aktivitasnya 
          di dunia kepramukaan (kepanduan) sebelum Gerakan Pramuka lahir (sebelum 1961), saat pendirian Gerakan Pramuka, maupun awal-awal perjalanan Gerakan Pramuka.
        </p>
        <p class="card-text">
        Keberhasilan Sri Sultan Hamengku Buwana IX dalam membangun Gerakan Pramuka dalam masa peralihan dari “kepanduan” ke “kepramukaan”, 
        mendapat pujian bukan saja dari dalam negeri, tetapi juga dari luar negeri. 
        Beliau bahkan akhirnya mendapatkan Bronze Wolf Award dari World Organization of the Scout Movement (WOSM) pada tahun 1973.
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 mx-auto">
                <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                    <p class="mb-0 mt-2 font-italic">"Seorang Pamuka tidak pernah terkejut; Dia tahu apa yang harus dilakukan ketika sesuatu yang tak terduga terjadi."</p>
                    <footer class="blockquote-footer pt-4 mt-4 border-top">Robert Boden-Powell
                    </footer>
                </blockquote>
   </div>
</div>
@include('layouts.footer')


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

</body>