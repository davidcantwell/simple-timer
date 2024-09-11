<form action="{{ url('/manage/timer/update') }}" method="post" id="form">
    @csrf

    <div class="mb-4">
        <label for="label"><b>Label</b></label>
        <input type="text" name="label" value="{{ $timer->label }}" class="form-control">
    </div>

    <p><b>Start Time</b></p>

    <div class="row mb-4">
        <div class="col-auto">
            @include('helper.select', [
                'options' => $hourSelectOptions,
                'selectName' => 'hour',
                'selectId' => 'hour',
                'selectedValue' => $timer->start->format("H")])
        </div>
        <div class="col-auto">:</div>
        <div class="col-auto">
            @include('helper.select', [
            'options' => $minuteSelectOptions,
            'selectName' => 'minute',
            'selectId' => 'minute',
            'selectedValue' => $timer->start->format("i")])
        </div>
        <div class="col-auto">:</div>
        <div class="col-auto">
            @include('helper.select', [
            'options' => $secondSelectOptions,
            'selectName' => 'second',
            'selectId' => 'second',
            'selectedValue' => $timer->start->format("s")])
        </div>
    </div>

    <div class="mb-3">
        <label for="hour">
            <b>Duration in minutes</b>
        </label>
        <input type="text" name="duration" class="form-control" value="{{ $timer->duration }}">
    </div>

    <div>
        <input type="submit" class="btn btn-primary" value="update">
        <input type="hidden" id="status" name="status" value="{{ $timer->status }}">
        <input type="button" class="btn btn-danger" id="deactivate" name="deactivate" value="deactivate">
    </div>

    <input type="hidden" name="id" value="{{ $timer->id }}">

</form>

<script>
    $(document).ready(function () {
        $('#deactivate').on('click', function (e) {
            e.preventDefault();
            var btn = $(this);
            if (confirm("Are you sure?")) {
                $('#status').val("inactive");
                $('#form').submit();
            }
        });
    });
</script>
