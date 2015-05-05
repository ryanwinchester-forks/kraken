@extends('app')

@section('styles')
    <style>
        .is-dragging {
            opacity: 0.2;
            border: 2px dashed #333;
            background-color: #ebebeb;
        }
    </style>
@stop

@section('content')
    <section class="container">
        <div id="property" data-id="{{ $property->id }}"></div>
    </section>
@stop

@section('scripts')
    <script src="/js/components/bundle.js"></script>
@stop
