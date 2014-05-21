@extends('layouts.master')
@section('title')Title here @stop

@section('content')
<div class="container">


    <section class="overview row">
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-body alert-info">
                    <div class="pull-left">
                        <h2>356 Sign ups</h2>

                        <p>In the last 24 hours</p>
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

                    <div class="ajax">
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Competition Signups</h3>
                </div>

                <div class="panel-body">
                    <div id="ajax"></div>
                </div>

            </div>
        </div>
    </section>
    <button id="change" class="btn btn-info">Click me you mother Ajax!</button>
</div>
@stop


