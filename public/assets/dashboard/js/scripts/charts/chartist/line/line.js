/*=========================================================================================
    File Name: line.js
    Description: Chartist simple line chart
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author:pharo101.tech
    Author URL: https://www.pharao101.tech 
==========================================================================================*/

// Line chart
// ------------------------------
$(window).on("load", function () {
    new Chartist.Line(
        "#line-chart",
        {
            labels: ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
            series: [
                [12, 9, 7, 8, 5],
                [2, 1, 3.5, 7, 3],
                [1, 3, 4, 5, 6],
            ],
        },
        {
            fullWidth: true,
            chartPadding: {
                right: 40,
            },
        }
    );
});
