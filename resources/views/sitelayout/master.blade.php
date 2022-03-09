<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('site/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    {{-- <link href="{{ URL::asset('/css/fonts/bootstrap-icons.css') }}" rel="stylesheet" /> --}}
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ URL::asset('site/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    @include('site_include.header');

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Section-->
    @yield('content')
    <!-- Footer-->
    @include('site_include.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    {{-- <script src="{{ URL::asset('/js/bootstrap.bundle.min.js') }}"></script> --}}

    <!-- Core theme JS-->
    <script src="{{ URL::asset('site/js/scripts.js') }}"></script>
</body>

</html>
