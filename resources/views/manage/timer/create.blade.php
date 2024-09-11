@extends('manage.base')

@section('content')
    <h2>Create Timer</h2>

    <form action="{{ url('/manage/timer/create') }}" method="post">
        @csrf

        <div class="mb-4">
            <label for="label">Label</label>
            <input type="text" name="label" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="duration">Duration in Minutes</label>

            <input type="number" name="duration" class="form-control" required>
            <p><small>3 hours is 180 minutes</small></p>
        </div>

        <div class="mb-4">
            <input type="submit" class="btn btn-primary" value="start timer" />
        </div>

    </form>
@endsection
