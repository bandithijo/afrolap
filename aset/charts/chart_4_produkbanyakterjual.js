//pie
var ctxP = document.getElementById("chart_4_produkbanyakterjual").getContext('2d');
var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
        labels: ["PT1", "PT2", "PT3", "PTP", "PDM"],
        datasets: [
            {
                label: 'Nama Produk',
                data: [2902000000, 9309000000, 920000000, 1501000000, 1002000000],
                backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
            }
        ]
    },
    options: {
        responsive: false
    }
});

