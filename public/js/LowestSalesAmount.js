var colors = [
    '#FF5733', '#33FF57', '#5733FF', '#FFFF33', '#33FFFF', '#FF33FF', '#FF5733', '#33FF57', '#5733FF',
    '#FFFF33', '#33FFFF', '#FF33FF', '#FF5733', '#33FF57', '#5733FF', '#FFFF33', '#33FFFF', '#FF33FF',
    '#FF5733', '#33FF57', '#5733FF', '#FFFF33', '#33FFFF', '#FF33FF', '#FF5733', '#33FF57', '#5733FF',
    '#FFFF33', '#33FFFF', '#FF33FF', '#FF5733', '#33FF57', '#5733FF', '#FFFF33', '#33FFFF', '#FF33FF',
    '#FF5733', '#33FF57', '#5733FF', '#FFFF33', '#33FFFF', '#FF33FF', '#FF5733', '#33FF57', '#5733FF',
    '#FFFF33', '#33FFFF', '#FF33FF'
];
    // Script untuk akses elemen dengan ID lowest dan highest
    var salesData = JSON.parse(document.querySelector('#lowest').dataset.lowSales);


var sales = salesData.map(function(item) {
    return item.sales_person.SalesPersonName;
});

var options = {
    series: [{
        data: salesData.map(function(item) {
            return item.SalesAmount;
        })
    }],
    chart: {
        height: 350,
        type: 'bar',
        events: {
            click: function(chart, w, e) {
                // console.log(chart, w, e)
            }
        }
    },
    colors: colors,
    plotOptions: {
        bar: {
            columnWidth: '45%',
            distributed: true,
        }
    },
    dataLabels: {
        enabled: false
    },
    legend: {
        show: false
    },
    xaxis: {
        categories: sales,
        labels: {
            style: {
                colors: colors,
                fontSize: '12px'
            }
        }
    }
};

var chart = new ApexCharts(document.querySelector("#lowest"), options);
chart.render();