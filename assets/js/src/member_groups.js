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


    /**
     * GETS MEMBERS BY MONTH (NON-ITERATIVE)
     */
//    var month_2 = [];
//    var members_per_month_2 = [];

//    $.each(range_month, function (key) {
//        var month_name,
//            member_count = 0;
//        _.find(members, function (mem) {
//            month_name = range_month[key];
//            if (mem.join_date >= range_month[key] && mem.join_date <= range_month[key + 1]) {
//                members_per_month_2.push(mem.username);
//                member_count++;
//            }
//        });
//        $date = new Date(month_name * 1000);
//        $date_month = $date.getMonth();
//        $date_year = $date.getFullYear();
//        month_2.push({
//            month_name: $date_month + "/" + $date_year,
//            count: member_count
//        })
//    });
//
//    var graph_month_data_count_2 = [];
//    var graph_month_data_name_2 = [];
//    $.each(month, function (key) {
//        graph_month_data_name_2.push(month_2[key]['month_name']);
//        graph_month_data_count_2.push(month_2[key]['count']);
//    })

});
