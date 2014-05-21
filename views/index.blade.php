@extends('layouts.master')
@section('title')SFM Dashboard @stop


@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>Member count (iterative)</h1>
            <canvas id="myChart" width="1100" height="200"></canvas>
        </div>
    </div>

    <section class="overview row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-body alert-info">
                    <div id="totalsignups" class="pull-left">
                        <h2></h2>

                        <p>Total Members</p>
                    </div>
                    <i class="fa fa-user fa-4x pull-right"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-warning">
                <div class="panel-body alert-warning">
                    <div class="pull-left">
                        <h2>1,556 Online </h2>

                        <p>In the last 30 minutes</p>
                    </div>
                    <i class="fa fa-globe fa-4x pull-right"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-danger">
                <div class="panel-body alert-danger">
                    <div class="pull-left">
                        <h2>35% Growth</h2>

                        <p>In the last month</p>
                    </div>
                    <i class="fa fa fa-bolt fa-4x pull-right"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="members row">
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">New Member Registration</h3>
                </div>

                <div class="panel-body">
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Competition Signups</h3>
                </div>

                <div class="panel-body">
                </div>

            </div>
        </div>
    </section>

</div>
@stop


