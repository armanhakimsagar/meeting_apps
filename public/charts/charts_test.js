
    Highcharts.chart('new_bar', {
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Rice',
                'Meat',
                'Chicken',
                'Fish'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
                name: 'Rice',
                data: [49.9]

            }, {
                name: 'Meat',
                data: [83.6]

            }, {
                name: 'Chicken',
                data: [48.9]

            }, {
                name: 'Fish',
                data: [42.4]

            }]
    });


    // pie chart 



   