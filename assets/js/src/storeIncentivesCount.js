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


    /**
     *
     * Get Valid/Invalid Staff Entry
     * @return members, id in array, status
     *
     */

    getStaff: function (members, result, status) {

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

        // Reverse sorted staff (most at idx 0)
        var sortedStaffRev = sortedStaff.reverse();

        var output = [];
        for (var i = 0; i < sortedStaffRev.length; ++i) {
            output.push(sortedStaffRev[i]);
        }

        return [
            "Staff ID " + output[result]['staff_id'] + " with ",
            output[result]['signups'] + " " + status
        ];
    },


    /**
     *
     * Count Gender of Mall Sign-ups
     * @return members,gender
     *
     */

    countGender: function (members, gender) {
        genderCount = _.groupBy(members, 'gender');

//        console.log("Females: " + genderCount.Female.length);
//        console.log("Males: " + genderCount.Male.length);


        return genderCount.gender;
    },


    /**
     *
     * Count Top Mall Sign-ups
     * @return members,mallId
     *
     */

    countMalls: function (members, mallId) {

        var mallCount = _.groupBy(members, 'mall');

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

        console.log(output[mallId]['mall_name'], output[mallId]['signups']);
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

        // Reverse sorted staff (most at idx 0)
        sortedBrandCountRev = sortedBrandCount.reverse();

        var output = [];
        for (var i = 0; i < sortedBrandCountRev.length; ++i) {
            output.push(sortedBrandCountRev[i]);
        }

        console.log(output[brandId]['brand_name'], output[brandId]['signups']);
        return [
            output[brandId]['brand_name'] + " with ",
            output[brandId]['signups'] + " sign-ups"
        ];
    }

}