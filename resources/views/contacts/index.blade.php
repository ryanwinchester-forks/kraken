@extends('layouts.master')

@section('content')
    <section class="container">

        <h1>Contacts</h1>

        @if ($contacts->count())
            <div ng-controller="contactsTableController">
                <table class="contacts-table table table-striped" tr-ng-grid items="contacts"
                    on-data-required="onServerSideItemsRequested(currentPage, pageItems, filterBy, filterByFields, orderBy, orderByReverse)"
                    filter-by="myFilter" page-items="pageItemsCount">
                    <thead>
                        <th field-name="name" display-name="Name" enable-filtering="false"></th>
                        <th field-name="description" display-name="Description" enable-filtering="false"></th>
                        <th field-name="views" display-name="Views" enable-filtering="false"></th>
                        <th field-name="submissions" display-name="Submissions" enable-filtering="false"></th>
                    </thead>
                </table>
            </div>
        @else
            <h3>There are no contacts.</h3>
        @endif

    </section>
@stop

@section('scripts')
    <script defer="true">
    'use strict';

        angular.
            module('Kraken', ['ui.bootstrap', 'trNgGrid']).
            controller("contactsTableController", function contactsTableController($scope, $http) {

                $scope.main = {
                    page: 1,
                    limit: 2
                }

                $scope.loadPage = function() {
                     $http.get('/api/contacts?limit=' + main.limit + '&page=' + main.page).success(function(contacts) {
                        $scope.contacts = contacts.data;
                        $scope.pageItems = contacts.per_page;
                        $scope.filterBy = $scope.search;
                     });
                }

            });
    </script>
@stop