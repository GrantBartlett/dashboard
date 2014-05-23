@extends('layouts.master')
@section('title')SFM Dashboard @stop


@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Welcome!</strong> I'm Betty, the SFM Dashboard Queen. I'm still being configured, so come back daily!
            </div>

            <h4>Quickfire stats</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">

            <div class="app-block">
                <ul class="list-group">
                    <li class="list-group-item active text-center">
                        <i class="fa fa-user"></i> Members
                    </li>
                    <li class="list-group-item text-center">
                        <div class="icon-container label label-primary pull-left"><i class="fa fa-user fa-fw"></i></div>
                        Total Members
                        <div class="stat pull-right" id="js_total_members" style="display: none;"></div>
                    </li>

                    <li class="list-group-item text-center">
                        <div class="icon-container label label-primary pull-left"><i class="fa fa-user fa-fw"></i></div>
                        Organic Members
                        <div class="stat pull-right" id="js_organic_total_members" style="display: none;"></div>
                    </li>

                    <li class="list-group-item text-center">
                        <div class="icon-container label label-primary pull-left"><i class="fa fa-times fa-fw"></i>
                        </div>
                        Organic Members Inactive
                        <div class="stat pull-right" id="js_organic_percent_active" style="display: none;"></div>
                    </li>

                    <li class="list-group-item text-center">
                        <div class="icon-container label label-primary pull-left"><i class="fa fa-facebook fa-fw"></i>
                        </div>
                        Facebook Registered
                        <div class="stat pull-right" id="js_facebook_total_members" style="display: none;"></div>
                    </li>
                </ul>
            </div>

        </div>

        <div class="col-md-4">

            <div class="app-block app-purple">
                <ul class="list-group">
                    <li class="list-group-item active text-center">
                        <i class="fa fa-trophy"></i> Competitions <span id="js_total_members"></span>
                    </li>
                    <li class="list-group-item text-center">
                        <div class="icon-container label label-primary pull-left"><i class="fa fa-user fa-fw"></i></div>
                        Total Number Signups
                        <div class="stat pull-right" id="js_facebook_total_members" style="display: none;"></div>
                    </li>
                </ul>
            </div>

        </div>

        <div class="col-md-4">

            <div class="app-block app-green">
                <ul class="list-group">
                    <li class="list-group-item active text-center">
                        <i class="fa fa-shopping-cart"></i> POS <span id="js_total_members"></span>
                    </li>
                    <li class="list-group-item text-center">
                        <div class="icon-container label label-primary pull-left"><i class="fa fa-user fa-fw"></i></div>
                        POS Members
                        <div class="stat pull-right" id="js_pos_total_members" style="display: none;"></div>
                    </li>

                    <li class="list-group-item text-center">
                        <div class="icon-container label label-primary pull-left"><i class="fa fa-times fa-fw"></i>
                        </div>
                        POS Members Inactive
                        <div class="stat pull-right" id="js_pos_percent_active_members" style="display: none;"></div>
                    </li>

                    <li class="list-group-item text-center">
                        <div class="icon-container label label-primary pull-left">
                            <i class="fa fa-paper-plane fa-fw"></i></div>
                        Valid Emails
                        <div class="stat pull-right" id="js_pos_valid_emails" style="display: none;"></div>
                    </li>

                    <li class="list-group-item text-center">
                        <div class="icon-container label label-primary pull-left">
                            <i class="fa fa-paper-plane fa-fw"></i></div>
                        Bogus Emails
                        <div class="stat pull-right" id="js_pos_bogus_emails" style="display: none;"></div>
                    </li>

                </ul>
            </div>

        </div>
    </div>

</div>


<section id="pos-breakdown">
    <div class="container">

        <div class="row">
            <div class="col-md-4">

                <h4>POS Breakdown</h4>

                <p>Data recorded since 12th May 2014</p>

                <div class="app-block">
                    <ul class="list-group">


                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <h4>Top 5 Mall Sign-ups</h4>

                <div class="app-block">
                    <ul class="list-group">
                        <li class="list-group-item text-center clearfix">
                            <div class="icon-container label label-primary pull-left">#1</div>
                            <div class="stat" id="js_pos_top_malls_1" style="display: none;"></div>
                        </li>

                        <li class="list-group-item text-center clearfix">
                            <div class="icon-container label label-primary pull-left">#2</div>
                            <div class="stat" id="js_pos_top_malls_2" style="display: none;"></div>
                        </li>

                        <li class="list-group-item text-center clearfix">
                            <div class="icon-container label label-primary pull-left">#3</div>
                            <div class="stat" id="js_pos_top_malls_3" style="display: none;"></div>
                        </li>

                        <li class="list-group-item text-center clearfix">
                            <div class="icon-container label label-primary pull-left">#4</div>
                            <div class="stat" id="js_pos_top_malls_4" style="display: none;"></div>
                        </li>

                        <li class="list-group-item text-center clearfix">
                            <div class="icon-container label label-primary pull-left">#5</div>
                            <div class="stat" id="js_pos_top_malls_5" style="display: none;"></div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <h4>Top 5 Mall Sign-ups</h4>

                <div class="app-block">
                    <ul class="list-group">
                        <li class="list-group-item text-center clearfix">
                            <div class="icon-container label label-primary pull-left">#1</div>
                            <div class="stat" id="js_pos_top_brands_1" style="display: none;"></div>
                        </li>

                        <li class="list-group-item text-center clearfix">
                            <div class="icon-container label label-primary pull-left">#2</div>
                            <div class="stat" id="js_pos_top_brands_2" style="display: none;"></div>
                        </li>

                        <li class="list-group-item text-center clearfix">
                            <div class="icon-container label label-primary pull-left">#3</div>
                            <div class="stat" id="js_pos_top_brands_3" style="display: none;"></div>
                        </li>

                        <li class="list-group-item text-center clearfix">
                            <div class="icon-container label label-primary pull-left">#4</div>
                            <div class="stat" id="js_pos_top_brands_4" style="display: none;"></div>
                        </li>

                        <li class="list-group-item text-center clearfix">
                            <div class="icon-container label label-primary pull-left">#5</div>
                            <div class="stat" id="js_pos_top_brands_5" style="display: none;"></div>
                        </li>
                    </ul>
                </div>
            </div>


        </div>

    </div>
</section>


<section id="graphs">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h1> New Member Registration</h1>

                <p>An iterative graph detailing new members and total members.</p>

                <br>
                <ul class="graph-key list-inline">
                    <li>
                        <i class="fa fa-circle new-registered"></i>
                        <small>New Members Registered</small>
                    </li>
                    <li>
                        <i class="fa fa-circle total-registered"></i>
                        <small>Total Members Registered</small>
                    </li>
                </ul>
            </div>

            <div class="col-md-6">
                <div class="app-block app-green">
                    <canvas id="myChart" width="600" height="250"></canvas>
                </div>
            </div>

        </div>
    </div>
</section>

@stop


