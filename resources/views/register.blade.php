<!DOCTYPE html>
<html lang="en">
<head>
    <title>register</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/register.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="/register" method="POST">
        <h3>Register Place</h3>
        @csrf
        <div class="mb-4">
                    <label for="input-name" class="form-label">Name</label>
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
                <div>
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
          <br><br>
          <p style="font-size: 10px; text-align: center; opacity: 80%"><a href="/login">Back</a></p>
    </form>
</body>
</html>