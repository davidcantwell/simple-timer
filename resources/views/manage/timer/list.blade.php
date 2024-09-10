@extends('manage.base')

@section('content')

    @if (count($timers) > 0)

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Lavel</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            @foreach ($timers as $timer)
                <tr>
                    <td>{{ $timer->label; }}</td>
                    <td>
                        <span class="float-end">
                            <a href="{{ url('/manage/edit') }}" class="btn btn-primary">edit</a>
                        </span>

                    </td>
                </tr>
            @endforeach
        </table>

    @else

        <p>There are no active timers.</p>

    @endif

    <p><a href="{{ url('manage/create') }}" class="btn btn-primary">Create Timer</a></p>

@endsection
