<html>

<head>
    <title>Timers</title>
    <link rel="stylesheet" href="{{ url('assets/bootstrap-5.3.3-dist/css/bootstrap.css') }}">
    <script src="{{ url('assets/js/jquery-3.7.1.min.js') }}"></script>
</head>

<div class="container">

    <h1>Manage Timers</h1>
    <div class="float-end">
        <a href="{{ url('/logout') }}" class="btn btn-secondary">logout</a>
    </div>



    @yield('content')
</div>


</html>
