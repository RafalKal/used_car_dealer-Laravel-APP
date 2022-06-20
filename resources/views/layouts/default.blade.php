<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auto4you | @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Belleza&display=swap" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

{{-- HEADER BLOCK --}}
<div class="page-header">
    <a href="{{url('/')}}" class="text-decoration-none">
        <h2>Auto4You</h2>
    </a>

    <section class="page-header-links">
        {{-- IF NOT LOGGED IN --}}
        @if(auth()->user() == null)
            <a href="{{url('login')}}">sign in</a>

        {{-- IF LOGGED IN --}}
        @else
            <a href="{{url('profile')}}">Welcome, {{auth()->user()->name}} {{auth()->user()->surname}}</a>
        @endif
    </section>
</div>

{{-- ADMIN PANEL --}}
<div class="content d-flex gap-lg-2 flex-row">
    @can('admin')
        <section class="w-25 panel-section d-flex flex-column">
            <header>Admin panel</header>
            <hr>
            <a href="{{url('manufacturers')}}">Manufacturers</a>
            <a href="{{url('models')}}">Models</a>
            <a href="{{url('transmissions')}}">Transmissions</a>
            <a href="{{url('fuel_types')}}">Fuels</a>
            <a href="{{url('orders')}}">Orders</a>
            @can('super-admin')
                <a href="{{url('users')}}">Users</a>
            @endcan
        </section>
    @endcan

    @yield('content')



</div>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
        alert(msg);
    }
</script>
</body>
</html>
