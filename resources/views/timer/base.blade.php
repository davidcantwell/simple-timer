<html>

<head>
    <title>
        @if (isset($timer))
            Timer: {{ $timer->label }}
        @else
            No active timer
        @endif
    </title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/draft-countdown.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<div class="container">
    @yield('content')
</div>

</html>
