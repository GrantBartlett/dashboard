/**
 * Created by grantbartlett on 21/05/2014.
 */

/**
 * Created by grantbartlett on 21/05/2014.
 */

var storeIncentivesCount = {

    // Split data into bogus and vaild lists
    // Bogus list
    bogusEntries: {},

    // Valid list
    validEntries: {},

    countTotal: function (members) {
        return members.length;
    },

    getValidEmails: function (members) {
        filtered_members = _.where(members, {"status": "valid"});
        return filtered_members.length;
    },

    getBogusEmails: function (members) {
        filtered_members = _.where(members, {"status": "bogus"});
        storeIncentivesCount.bogusEntries = filtered_members;
        return filtered_members.length;
    },

    getStaff: function (members, status) {

        // Get top staff doing valid data
        var staff = _.groupBy(_.where(members, {"status": status}), 'staff_id');
        var staffNums = _.map(staff, function (val, key) {
            return {
                staff_id: key,
                signups: val.length
            }
        });

        // Sorted staff
        var sortedStaff = _.sortBy(staffNums, function (o) {
            return o.signups
        });
        // console.log(sortedTopStaff);

        // Reverse sorted staff (most at idx 0)
        var sortedStaffRev = sortedStaff.reverse();
        // console.log(sortedTopStaffRev);

        console.log("The top 3 staff inputting " + status + " data are...");
        console.log("At 1... " + sortedStaffRev[0].staff_id + " with " + sortedStaffRev[0].signups + " signups.");
        console.log("At 2... " + sortedStaffRev[1].staff_id + " with " + sortedStaffRev[1].signups + " signups.");
        console.log("At 3... " + sortedStaffRev[2].staff_id + " with " + sortedStaffRev[2].signups + " signups.");
    },

    countGender: function (members) {
        genderCount = _.groupBy(members, 'gender');
        // console.log(genderCount);
        console.log("Females: " + genderCount.Female.length);
        console.log("Males: " + genderCount.Male.length);
    },




    /**
     *
     * Count Top Mall Sign-ups
     * @return members,mallId
     *
     */

    countMalls: function (members, mallId) {

        mallCount = _.groupBy(members, 'mall');

        mallCountNums = _.map(mallCount, function (val, key) {
            return {
                mall_name: key,
                signups: val.length
            }
        });

        // Sorted staff
        sortedMallCount = _.sortBy(mallCountNums, function (o) {
            return o.signups
        });

        // Reverse sorted staff (most at idx 0)
        sortedMallCountRev = sortedMallCount.reverse();

        var output = [];

        for (var i = 0; i < sortedMallCountRev.length; ++i) {
            output.push(sortedMallCountRev[i]);
        }

        console.log(output[mallId]['mall_name'],output[mallId]['signups']);
        return [
            output[mallId]['mall_name'] + " with ",
            output[mallId]['signups'] + " sign-ups"
        ];
    },




    /**
     *
     * Count Top Brand Sign-ups
     * @return members, brandId
     *
     */

    countBrands: function (members, brandId) {
        brandCount = _.groupBy(members, 'brand');

        brandCountNums = _.map(brandCount, function (val, key) {
            return {
                brand_name: key,
                signups: val.length
            }
        });

        // Sorted staff
        sortedBrandCount = _.sortBy(brandCountNums, function (o) {
            return o.signups
        });
        // console.log(sortedMallCount);

        // Reverse sorted staff (most at idx 0)
        sortedBrandCountRev = sortedBrandCount.reverse();
        // console.log(brandCount);
//        console.log("The top 3 malls...");
//        console.log("At 1: " + sortedBrandCountRev[0].brand_name + " with " + sortedBrandCountRev[0].signups + " signups.");
//        console.log("At 2: " + sortedBrandCountRev[1].brand_name + " with " + sortedBrandCountRev[1].signups + " signups.");
//        console.log("At 3: " + sortedBrandCountRev[2].brand_name + " with " + sortedBrandCountRev[2].signups + " signups.");


        var output = [];

        for (var i = 0; i < sortedBrandCountRev.length; ++i) {
            output.push(sortedBrandCountRev[i]);
        }

        console.log(output[brandId]['brand_name'],output[brandId]['signups']);
        return [
            output[brandId]['brand_name'] + " with ",
            output[brandId]['signups'] + " sign-ups"
        ];

    }

}