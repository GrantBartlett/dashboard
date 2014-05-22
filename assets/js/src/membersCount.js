/**
 * Created by grantbartlett on 21/05/2014.
 */

var membersCount = {

    countTotal: function (members) {
        return members.length;
    },

    countPOS: function (members) {
        filtered_members = _.where(members, {"group_id" : 8});
        return filtered_members.length;
    },

    countFG4: function (members) {
        filtered_members = _.where(members, {"group_id" : 9});
        return filtered_members.length;
    },

    countNormal: function (members) {
        filtered_members = _.where(members, {"group_id" : 5});
        return filtered_members.length;
    },

    getNonActivePOS: function(members) {
        filtered_members = _.where(members, {"group_id" : 8, "last_visit" : 0});
        return filtered_members.length;
    },

    getNonActiveNormal: function(members) {
        filtered_members = _.where(members, {"group_id" : 5, "last_visit" : 0});
        return filtered_members.length;
    },

    getNonFacebook: function(members) {
        filtered_members = _.where(members, {"facebook" : 0});
        return filtered_members.length;
    },

    getFacebookSignUps: function(members) {
        filtered_members = _.reject(members, function(member) {
            return member['facebook'] == 0;
        });
        return filtered_members.length;
    }


}