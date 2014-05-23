<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
@include('partials.navigation')

@yield('content')
</body>


<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="http://underscorejs.org/underscore-min.js"></script>
<script src="/assets/js/src/chart.min.js"></script>


<script src="/assets/js/src/get_members.js"></script>
<script src="/assets/js/src/membersPerMonth.js"></script>
<script src="/assets/js/src/membersCount.js"></script>

<script src="/assets/js/src/storeIncentives.js"></script>
<script src="/assets/js/src/storeIncentivesCount.js"></script>


<script>
    $(function () {

        $.getJSON("http://sfmreport.api/api/v1/members", {format: "json"})
            .done(function (data) {
                $.each(data, function (key, val) {
                    getMembers.members.push({
                        email: val.email,
                        username: val.username,
                        screen_name: val.screen_name,
                        group_id: val.group_id,
                        join_date: val.join_date,
                        last_activity: val.last_activity,
                        last_visit: val.last_visit,
                        facebook: val.facebook_connect_user_id
                    });
                });

                var $members = getMembers.members;

                // Member count graph
                membersPerMonth.membersPerMonth($members);
                membersPerMonth.membersPerMonthNonIt($members);
                membersPerMonth.buildChart();

                // Member count total
//                console.log("Total members: " + membersCount.countTotal($members));
//                console.log("POS members: " + membersCount.countPOS($members));
//                console.log("FG4 members: " + membersCount.countFG4($members));
//                console.log("Normal members: " + membersCount.countNormal($members));
//
//                console.log("Non active POS members: " + membersCount.getNonActivePOS($members));
//                console.log("Non active normal members: " + membersCount.getNonActiveNormal($members));
//
//                console.log("Percentage of non active normal members: " + (parseFloat(membersCount.getNonActiveNormal($members) / membersCount.countNormal($members)).toFixed(2) * 100) + "%");
//                console.log("Percentage of non active POS members: " + (parseFloat(membersCount.getNonActivePOS($members) / membersCount.countPOS($members)).toFixed(2) * 100) + "%");
//
//                console.log("Facebook signups: " + membersCount.getFacebookSignUps($members));
//                console.log("Facebook non-signups: " + membersCount.getNonFacebook($members));



                // Member Stats

                $("#js_total_members").fadeIn(500).html(membersCount.countTotal($members));
                $("#js_organic_percent_active").fadeIn(500).html((parseFloat(membersCount.getNonActiveNormal($members) / membersCount.countNormal($members)).toFixed(2) * 100) + "%");
                $("#js_facebook_total_members").fadeIn(500).html(membersCount.getFacebookSignUps($members));

                $("#js_pos_total_members").fadeIn(500).html(membersCount.countPOS($members));
                $("#js_organic_total_members").fadeIn(500).html(membersCount.countNormal($members));
                $("#js_pos_percent_active_members").fadeIn(500).html((parseFloat(membersCount.getNonActivePOS($members) / membersCount.countPOS($members)).toFixed(2) * 100) + "%");


            });

        $.getJSON("http://sfmreport.api/api/v1/incentive", {format: "json"})
            .done(function (data) {
                $.each(data, function (key, val) {
                    storeIncentives.storeMembers.push({
                        store: val.store,
                        brand: val.brand,
                        mall: val.mall,
                        tran_date: val.tran_date,
                        tran_no: val.tran_no,
                        customer_name: val.customer_name,
                        gender: val.gender,
                        mobile: val.mobile,
                        email: val.email,
                        staff_id: val.staff_id,
                        import_date: val.import_date,
                        file_name: val.file_name,
                        status: val.status
                    });
                })

                var $storeIncentives = storeIncentives.storeMembers;

//                console.log("storeIncentives.countTotal: " + storeIncentivesCount.countTotal($storeIncentives));
//                console.log("getValidEmails: " + storeIncentivesCount.getValidEmails($storeIncentives));
//                console.log("getBogusEmails: " + storeIncentivesCount.getBogusEmails($storeIncentives));

                // POS Breakdown
                $("#js_pos_valid_emails").fadeIn(500).html(storeIncentivesCount.getValidEmails($storeIncentives));
                $("#js_pos_bogus_emails").fadeIn(500).html(storeIncentivesCount.getBogusEmails($storeIncentives));

                // POS Top 5 Mall Sign-ups
                $("#js_pos_top_malls_1").fadeIn(500).html(storeIncentivesCount.countMalls($storeIncentives,"0"));
                $("#js_pos_top_malls_2").fadeIn(500).html(storeIncentivesCount.countMalls($storeIncentives,"1"));
                $("#js_pos_top_malls_3").fadeIn(500).html(storeIncentivesCount.countMalls($storeIncentives,"2"));
                $("#js_pos_top_malls_4").fadeIn(500).html(storeIncentivesCount.countMalls($storeIncentives,"3"));
                $("#js_pos_top_malls_5").fadeIn(500).html(storeIncentivesCount.countMalls($storeIncentives,"4"));

                // POS Top 5 Brand Sign-ups
                $("#js_pos_top_brands_1").fadeIn(500).html(storeIncentivesCount.countBrands($storeIncentives,"0"));
                $("#js_pos_top_brands_2").fadeIn(500).html(storeIncentivesCount.countBrands($storeIncentives,"1"));
                $("#js_pos_top_brands_3").fadeIn(500).html(storeIncentivesCount.countBrands($storeIncentives,"2"));
                $("#js_pos_top_brands_4").fadeIn(500).html(storeIncentivesCount.countBrands($storeIncentives,"3"));
                $("#js_pos_top_brands_5").fadeIn(500).html(storeIncentivesCount.countBrands($storeIncentives,"4"));


//                storeIncentivesCount.getStaff($storeIncentives, "valid");
//                storeIncentivesCount.getStaff($storeIncentives, "bogus");
//                storeIncentivesCount.countGender($storeIncentives);


//                storeIncentivesCount.countBrands($storeIncentives);


            })
    });
</script>
</html>