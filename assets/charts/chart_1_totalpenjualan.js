var ctx = document.getElementById("chart_1_totalpenjualan").getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["2002", "2003"],
        datasets: [{
            label: 'Total Penjualan',
            data: [13712000000, 1002000000],
            backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});