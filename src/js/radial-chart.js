import ApexCharts from 'apexcharts';



var createChart = function(fill_color = '#333', value=245, max = 1000, id){
   
var options = {
    series: [value/max*100],
    chart: {
        height: 150,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            hollow: {

                size: '25%',

            },
            dataLabels: {
                name: {
                    show: false,
                    color: '#fff'
                },
                value: {
                    show: true,
                    color: fill_color,
                    offsetY: 7,
                    fontSize: '18px'
                },
                total: {
                    show: true,
                    label: 'Total',
                    formatter: function (w) {
                        
                        return value;
                    }
                }
            },
        }
    },

    labels: ['Volatility'],
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
};

createChart();