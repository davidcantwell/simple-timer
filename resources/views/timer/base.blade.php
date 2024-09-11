<html>

<head>
    <title>
        @if (isset($timer))
            {{ $timer->getTimeElements()['h1'] . $timer->getTimeElements()['h2'] . ':' . $timer->getTimeElements()['m1'] . $timer->getTimeElements()['m2'] . ':' . $timer->getTimeElements()['s1'] . $timer->getTimeElements()['s2'] }}
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
