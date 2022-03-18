<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
    <link rel="stylesheet" href="{{ asset('Admin/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6">
                <h1 class="text-center my-2">Sign in</h1>
                <form action="{{ route('handle.login') }}" method="POST" enctype="multipart/form-data" class="border rounded p-3">
                    @csrf {{-- @csrf => tạo ra token --}} 
                    {{-- CSRF (cross-site request forgery) --}}
                    
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
    </div>
    

    <script src="{{ asset('Admin/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('Admin/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>