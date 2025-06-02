/*=========================================================================================
    File Name: gauge.js
    Description: Chartist gauge chart
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author:pharo101.tech
    Author URL: https://www.pharao101.tech 
==========================================================================================*/

// Gauge chart
// ------------------------------
$(window).on("load", function () {
    new Chartist.Pie(
        "#gauge-chart",
        {
            series: [20, 10, 30, 40],
        },
        {
            donut: true,
            donutWidth: 60,
            startAngle: 270,
            total: 200,
            showLabel: false,
        }
    );
});
