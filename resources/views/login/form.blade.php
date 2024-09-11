@extends('login.base')
@section('content')

    <h1>Login</h1>

    <form action="{{ url('/login') }}" method="post">
        @csrf
        <div class="mb-2">
            <label for="pin">PIN</label>
            <input type="password" name="pin" id="pin" class="form-control">
        </div>
        <div class="mb-2">
            <input type="submit" value="login" class="btn btn-primary">
        </div>
    </form>

@endsection
