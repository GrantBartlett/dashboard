/**
 * Created by grantbartlett on 09/05/2014.
 */
$(function () {
    $('#change').on('click', function () {
        $('.ajax').load('/ajax2');
    });
});


/**
 *  Underscore JS
 */



$(function () {
    var members = [];
    $.getJSON("http://sfmreport.api/api/v1/members/", function (data) {


//        console.log(data);

        $.each(data, function (key, val) {
            members.push({
                email: val.email,
                username: val.username,
                screen_name: val.screen_name,
                group_id: val.group_id,
                join_date: val.join_date,
                last_activity: val.last_activity,
                last_visit: val.last_visit
            });
        });

        var dates = [];

        $.each(members, function (key, val) {
            dates.push(val.join_date);
        });

        var now_time = 1400595890,
            one_week = 604800,
            one_month = 2629743,
            min_date = _.min(dates),
            range_week = _.range(min_date, now_time, one_week),
            range_month = _.range(min_date, now_time, one_month);

//        console.log(range_week);
//        console.log(range_month);

        var week = [];
        var members_per_week = [];

        $.each(range_week, function (key) {
            _.find(members, function (mem) {
                if (mem.join_date >= range_week[key] && mem.join_date <= range_week[key + 1]) {
                    members_per_week.push(mem.username);
                }
            });
            week.push({
                week: key,
                count: members_per_week.length
            })
        });

        console.log(week);


        /**
         * GETS MEMBERS BY MONTH (ITERATIVE)
         */
        var month = [];
        var members_per_month = [];

        $.each(range_month, function (key) {
            var month_name;
            _.find(members, function (mem) {
                month_name = range_month[key];
                if (mem.join_date >= range_month[key] && mem.join_date <= range_month[key + 1]) {
                    members_per_month.push(mem.username);
                }
            });
            $date = new Date(month_name * 1000);
            $date_month = $date.getMonth();
            $date_year = $date.getYear();
            month.push({
                month_name: $date_month + "/" + $date_year,
                count: members_per_month.length
            })
        });

        var graph_month_data_count = [];
        var graph_month_data_name = [];
        $.each(month, function (key) {
            graph_month_data_name.push(month[key]['month_name']);
            graph_month_data_count.push(month[key]['count']);
        })

        var ctx = document.getElementById("myChart").getContext("2d");

        var data = {
            labels: graph_month_data_name,
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    data: graph_month_data_count
                }
            ]
        }
        new Chart(ctx).Line(data);


        /**
         * GETS MEMBERS BY MONTH (NON-ITERATIVE)
         */
        var month_2 = [];
        var members_per_month_2 = [];

        $.each(range_month, function (key) {
            var month_name,
                member_count = 0;
            _.find(members, function (mem) {
                month_name = range_month[key];
                if (mem.join_date >= range_month[key] && mem.join_date <= range_month[key + 1]) {
                    members_per_month_2.push(mem.username);
                    member_count++;
                }
            });
            $date = new Date(month_name * 1000);
            $date_month = $date.getMonth();
            $date_year = $date.getFullYear();
            month_2.push({
                month_name: $date_month + "/" + $date_year,
                count: member_count
            })
        });

        var graph_month_data_count_2 = [];
        var graph_month_data_name_2 = [];
        $.each(month, function (key) {
            graph_month_data_name_2.push(month_2[key]['month_name']);
            graph_month_data_count_2.push(month_2[key]['count']);
        })

        var ctx2 = document.getElementById("myChart2").getContext("2d");

        var data2 = {
            labels: graph_month_data_name_2,
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    data: graph_month_data_count
                },
                {
                    fillColor : "rgba(151,187,205,0.5)",
                    strokeColor : "rgba(151,187,205,1)",
                    pointColor : "rgba(151,187,205,1)",
                    pointStrokeColor : "#fff",
                    data: graph_month_data_count_2
                }

            ]
        }
        new Chart(ctx2).Line(data2);

        console.log(month_2);

    });


});
