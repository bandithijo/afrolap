//pie
var ctxP = document.getElementById("chart_5_pembelitertinggi").getContext('2d');
var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
        labels: ["Importir", "Pabrik"],
        datasets: [
            {
                label: 'Tipe Pelanggan',
                data: [10810000000, 4824000000],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }
        ]
    },
    options: {
        responsive: false
    }
});

