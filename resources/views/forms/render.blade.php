
<ul>
    @foreach ($form->properties as $property)
        <li>
            {{ $property->name }}
            @if ($property->type->element === 'select')
                <ul>
                    @foreach ($property->options as $option)
                        <li>{{ $option->label }}</li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>