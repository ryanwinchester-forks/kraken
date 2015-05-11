
<select class="form-control">
    @foreach ($property->options as $option)
        <option value="{{ $option->value }}">{{ $option->label }}</option>
    @endforeach
</select>
