@extends('layouts.master')

@section('content')

<section class="container">

    <h1>Edit {{ $form->name  }}</h1>

    <form role="form" method="POST" action="{{ route('forms.update', $form->id) }}">

        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" value="{{ $form->name or null }}" name="name" placeholder="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" value="{{ $form->description or null }}" name="description" placeholder="description" id="description" class="form-control">
        </div>

        <div class="form-group">
            <label for="views">Views:</label>
            <input type="text" value="{{ $form->views or 0 }}" name="views" placeholder="views" id="views" class="form-control" disabled>
        </div>

        <div class="form-group">
            <label for="submissions">Submissions:</label>
            <input type="text" value="{{ $form->submissions or 0 }}" name="submissions" placeholder="submissions" id="submissions" class="form-control" disabled>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('forms.index') }}" class="btn btn-default">Cancel</a>
        </div>

    </form>

</section>

@stop

@section('scripts')
    <script>
        angular.
            module('Kraken', ['ui-bootstrap']).
            controller('formEditController', function forEditController($scope, $http) {
                //
            });
    </script>
@stop