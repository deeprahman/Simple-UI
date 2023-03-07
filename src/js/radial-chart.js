import ApexCharts from 'apexcharts';



var createChart = function(id, value=245, max = 1000,fill_color = '#333'){
   
var options = {
    series: [value/max*100],
    chart: {
        height: 150,
        width: 100,
        type: 'radialBar',
    },
    plotOptions: {
        radialBar: {
            hollow: {

                size: '45%',

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

var chart = new ApexCharts(document.querySelector("#"+id), options);
chart.render();
};

createChart('publishing-options__fig-1',50,100);
createChart('publishing-options__fig-2',23,100);
createChart('site-stat__fig-1',23,100);
createChart('site-stat__fig-2',23,100);
createChart('site-stat__fig-11',89,100);
createChart('site-stat__fig-12',38,100);
createChart('domain-name-fig-1',38,100);
createChart('domain-name-fig-2',38,100);
