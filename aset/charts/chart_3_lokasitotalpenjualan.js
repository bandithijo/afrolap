//pie
var ctxP = document.getElementById("chart_3_lokasitotalpenjualan").getContext('2d');
var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
        labels: ["Balikpapan"],
        datasets: [
            {
                label: 'Lokasi Penjualan',
                data: [9309000000, 2902000000],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }
        ]
    },
    options: {
        responsive: false
    }
});

