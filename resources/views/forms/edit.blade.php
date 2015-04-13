@extends('app')

@section('content')
    <section class="container">
        <div id="form" data-id="{{ $form->id }}"></div>
    </section>
@stop

@section('scripts')
    <script src="/js/components/Forms/bundle.js"></script>
@stop