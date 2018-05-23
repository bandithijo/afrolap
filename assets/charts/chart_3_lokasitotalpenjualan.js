var ctx = document.getElementById("chart_3_lokasitotalpenjualan").getContext('2d');
var myChart1 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Balikpapan"],
        datasets: [{
            label: 'Lokasi Penjualan',
            data: [9309000000, 2902000000],
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
