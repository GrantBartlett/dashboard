@extends('layouts.master')
@section('title')SFM Dashboard @stop


@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Welcome! </strong>

                <p>Please note: POS Results are based on data recorded since 12th of May 2014</p>
            </div>

            <h4>Quickfire stats</h4>
            <div id="test"></div>
            <div id="test-2">Total count</div>
        </div>
    </div>

    <script>
        var members = [];

        $.getJSON("http://sfmreport.api/api/v1/users?sort_by=join_date&sort=desc&limit=&gid=1&min_date=1370513563&max_date=1401455449", function (data) {
            $("#test").html(data['users']['0']['username']);
            $("#test-2").html(data['total_count'])
        });
    </script>

</div>
@stop
