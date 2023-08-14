<!DOCTYPE html>
<html lang="en">
<head>
    <title>login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
   
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="{{route('postlogin')}}" method="POST">
        @csrf
        <h3>Login Here</h3>

        <label for="email">Email</label>
        <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" 
        placeholder="name@example.com" autofocus required value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <label for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
        autofocus required value="{{ old('password') }}">
                    @error('email')
                    <div class="invalid-feedback">
            {{ $message }}
        </div>
                    @enderror
        <br>
        <small class="d-block text-center mt-3">
            <p style="font-size: 10px; text-align: right; opacity: 80%">Don't have an account? <a href="/register">Register</a></p>
</small>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Log In</button>
        @error('auth')
        <small class="text-danger mt-2">{{ $message }}</small>
        @enderror
          <br><br>
          <p style="font-size: 10px; text-align: center; opacity: 80%"><a href="/">Back</a></p>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
</body>

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
