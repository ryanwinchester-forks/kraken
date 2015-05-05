@extends('app')

@section('content')
    <section class="container">

        <table class="table table-rounded table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                <tr>
                    <td><a href="{{ route('properties.edit', [$property->id]) }}">{{ $property->name }}</a></td>
                    <td>{{ $property->type->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="properties"></div>
    </section>
@stop

@section('scripts')
    <script src="/js/dashboard.js"></script>
@stop
