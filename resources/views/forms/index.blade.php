@extends('layouts.master')

@section('content')
    <section class="container">

        <h1>Forms</h1>

        @if ($forms->count())

            <input type="search" class="form-control" placeholder="filter" ng-model="search">

            <table class="forms-table table table-striped" ng-controller="formsTableController">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Views</th>
                        <th>Submissions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="form in forms | filter:search">
                        <td><a href="/forms/@{{ form.id }}/edit">@{{ form.name }}</a></td>
                        <td>@{{ form.description }}</td>
                        <td>@{{ form.views }}</td>
                        <td>@{{ form.submissions }}</td>
                    </tr>
                </tbody>
            </table>
        @else
            <h3>There are no forms.</h3>
        @endif

    </section>
@stop

@section('scripts')
    <script defer="true">
        angular.
            module('Kraken', ['ui.bootstrap']).
            controller("formsTableController", function formsTableController($scope, $http) {

                $http.get('/api/forms').success(function(forms) {
                    $scope.forms = forms;
                });

            });
    </script>
@stop