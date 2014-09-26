@extends('layouts.master')

@section('content')
    <section class="container">

        <h1>Contacts</h1>

        @if ($contacts->count())

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->email }}</td>
                    </tr>
                   @endforeach
               </tbody>
           </table>
        @else
            <h3>There are no contacts.</h3>
        @endif

    </section>
@stop

@section('scripts')
    <script defer="true">

    </script>
@stop