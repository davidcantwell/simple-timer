@extends('timer.base')

@section('content')

    <h1>{{ $timer->label }}</h1>

    @include('timer.draftcountdown')

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/TweenMax.min.js"></script>
    <script src="assets/js/count.js"></script>
@endsection
