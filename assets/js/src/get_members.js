/**
 * Created by grantbartlett on 21/05/2014.
 */



var getMembers = {

    members: [],

    getMemberData: function () {

        var dashboardAPI = "/assets/js/src/test.json";
        var memberdat = [];
        var that = this;

        $.getJSON(dashboardAPI, {format: "json"})
            .done(function (data) {
                $.each(data, function (key, val) {
                    that.members.push({
                        email: val.email,
                        username: val.username,
                        screen_name: val.screen_name,
                        group_id: val.group_id,
                        join_date: val.join_date,
                        last_activity: val.last_activity,
                        last_visit: val.last_visit
                    });
                })

            });
        return this;
    }

};



