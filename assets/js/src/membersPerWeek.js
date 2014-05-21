/**
 * Created by grantbartlett on 21/05/2014.
 */

var membersPerWeek = {

    membersPerWeek: function(members) {

        var dates = [];

        $.each(getMembers.members, function (key, val) {
            dates.push(val.join_date);
        });

        var now_time = 1400595890,
            one_week = 604800,
            min_date = _.min(dates),
            range_week = _.range(min_date, now_time, one_week);

        var week = [];
        var members_per_week = [];

        $.each(range_week, function (key) {
            var week_name;
            _.find(members, function (mem) {
                week_name = range_week[key];
                if (mem.join_date >= range_week[key] && mem.join_date <= range_week[key + 1]) {
                    members_per_week.push(mem.username);
                }
            });
            var $date = new Date(week_name * 1000);
            var $date_week = $date.getWeek();
            var $date_year = $date.getYear();
            week.push({
                week_name: $date_week + "/" + $date_year,
                count: members_per_week.length
            })
        });

        var graph_week_data_count = [];
        var graph_week_data_name = [];
        $.each(week, function (key) {
            graph_week_data_name.push(week[key]['week_name']);
            graph_week_data_count.push(week[key]['count']);
        })

        var ctx = document.getElementById("myChart").getContext("2d");

        var data = {
            labels: graph_week_data_name,
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    data: graph_week_data_count
                }
            ]
        }
        new Chart(ctx).Line(data);
    }

}