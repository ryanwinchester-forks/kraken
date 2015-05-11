
<form class="kraken-form" role="form">
    @foreach ($form->properties as $property)
        <div class="kraken-form-group form-group">
            @include("forms.bootstrap.elements.{$property->type->element}")
        </div>
    @endforeach
</form>
