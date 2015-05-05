@extends('app')

@section('content')
    <section class="container">

        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Properties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                <tr>
                    <td><a href="{{ route('forms.edit', [$form->id]) }}">{{ $form->name }}</a></td>
                    <td>{{ $form->properties->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="forms"></div>
    </section>
@stop

@section('scripts')
    <script src="/js/dashboard.js"></script>
@stop
