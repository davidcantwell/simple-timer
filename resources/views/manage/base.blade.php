<html>

<head>
    <title>Timers</title>
    <link rel="stylesheet" href="{{ url('assets/bootstrap-5.3.3-dist/css/bootstrap.css') }}">
    <script src="{{ url('assets/js/jquery-3.7.1.min.js') }}"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div class="container">

    <div class="clearfix">
        <div class="float-start"><h1>Manage Timers</h1></div>
        <div class="float-end mt-2">
            <a href="{{ url('/logout') }}" class="btn btn-secondary">logout</a>
        </div>
    </div>

    <div class="clearfix mt-3">
        @yield('content')
    </div>



</div>


</html>
