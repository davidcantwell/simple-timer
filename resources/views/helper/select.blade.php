<select name="{{ $selectName }}" class="form-control" id="{{ $selectId }}">
    @if (isset($pleaseSelect))
        <option value="">Please select...</option>
    @endif

    @foreach ($options as $option)
        <option value="{{ $option['value'] }}"
            @if (isset($selectedValue) && $option['value']== $selectedValue)
                selected="selected"
            @endif
        >{{ $option['label'] }}</option>
    @endforeach
</select>
