/**
 * Created by grantbartlett on 21/05/2014.
 */

var membersPerMonth = {

    graphDatasets: [],
    graphLabel: [],

    membersPerMonth: function (members) {

        var dates = [];

        $.each(getMembers.members, function (key, val) {
            dates.push(val.join_date);
        });

        var now_time = 1400595890,
            one_month = 2629743,
            min_date = _.min(dates),
            range_month = _.range(min_date, now_time, one_month);

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
            var $date = new Date(month_name * 1000);
            var $date_month = $date.getMonth();
            var $date_year = $date.getFullYear();
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
        });

        membersPerMonth.graphDatasets.push({
            fillColor: "rgba(124,148,168,0.3)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            data: graph_month_data_count
        });

        membersPerMonth.graphLabel = graph_month_data_name;
    },

    membersPerMonthNonIt: function (members) {

        var dates = [];

        $.each(getMembers.members, function (key, val) {
            dates.push(val.join_date);
        });

        var now_time = 1400595890,totalsignups
            one_month = 2629743,
            min_date = _.min(dates),
            range_month = _.range(min_date, now_time, one_month);

        var month = [];
        var members_per_month = [];

        $.each(range_month, function (key) {
            var month_name,
                member_count = 0;
            _.find(members, function (mem) {
                month_name = range_month[key];
                if (mem.join_date >= range_month[key] && mem.join_date <= range_month[key + 1]) {
                    members_per_month.push(mem.username);
                    member_count++;
                }
            });
            var $date = new Date(month_name * 1000);
            var $date_month = $date.getMonth();
            var $date_year = $date.getFullYear();
            month.push({
                month_name: $date_month + "/" + $date_year,
                count: member_count
            })
        });

        var graph_month_data_count = [];
        var graph_month_data_name = [];
        $.each(month, function (key) {
            graph_month_data_name.push(month[key]['month_name']);
            graph_month_data_count.push(month[key]['count']);
        })

        //rgb(47, 67, 84)
        membersPerMonth.graphDatasets.push({
            fillColor: "rgba(47,67,84,0.95)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            data: graph_month_data_count
        })

    },

    buildChart: function () {

        var ctx = document.getElementById("myChart").getContext("2d");

        var data = {
            labels: membersPerMonth.graphLabel,
            datasets: membersPerMonth.graphDatasets
        };

        new Chart(ctx).Line(data);

    }

}