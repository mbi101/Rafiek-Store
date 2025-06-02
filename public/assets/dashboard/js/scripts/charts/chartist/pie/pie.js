/*=========================================================================================
    File Name: pie.js
    Description: Chartist simple pie chart
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author:pharo101.tech
    Author URL: https://www.pharao101.tech 
==========================================================================================*/

// Pie chart
// ------------------------------
$(window).on("load", function () {
    var data = {
        series: [5, 3, 4],
    };

    var sum = function (a, b) {
        return a + b;
    };

    new Chartist.Pie("#pie-chart", data, {
        labelInterpolationFnc: function (value) {
            return Math.round((value / data.series.reduce(sum)) * 100) + "%";
        },
    });
});
