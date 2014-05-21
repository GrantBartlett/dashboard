/**
 * Created by grantbartlett on 21/05/2014.
 */

/**
 * Created by grantbartlett on 21/05/2014.
 */

var storeIncentivesCount = {

    countTotal: function (members) {
        return members.length;
    },

    getValidEmails: function(members) {
        filtered_members = _.where(members, {"status" : "valid"});
        return filtered_members.length;
    },

    getBogusEmails: function(members) {
        filtered_members = _.where(members, {"status" : "bogus"});
        return filtered_members.length;
    }

//    getFacebookSignUps: function(members) {
//        filtered_members = _.reject(members, function(member) {
//            return member['facebook'] == 0;
//        });
//        return filtered_members.length;
//    }

}