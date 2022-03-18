<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('Admin/css/bootstrap.min.css') }}">
    @stack('style')
</head>
<body>
    <div class="container-fuild">
        <header>
            {{-- @include() => dùng import các phần vào layout chính --}}
            @include('layout.partials.header_view')
        </header>
        <main style="height: 600px">
            <div class="row">
                <div class="col-md-2">
                    @include('layout.partials.sidebar_view')
                </div> {{-- sidebar --}}
                <div class="col-md-10">
                    
                        {{-- @yield() => dùng import các nội dung vào layout chính --}}
                        @yield('main')
                    
                </div> {{-- main --}}
            </div>
        </main>
        <footer>
            <div class="row">
                <div class="col-md-12 bg-secondary text-white text-center w-100">
                   @include('layout.partials.footer_view')
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('Admin/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('Admin/js/bootstrap.bundle.min.js') }}"></script>
    @stack('script')
</body>
</html>