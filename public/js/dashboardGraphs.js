var chartCanvas1 = document.getElementById('chart1');
var configCanvas1 = {
    type: "bar",
    data: {
        labels: ["Bill", "Jeff", "Michael", "Tim", "Zuck"],
        datasets: [{
            label: "Number of Cookies",
            data: [5, 2, 12, 22, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
        }]
    }
};

var myChart1 = new Chart(chartCanvas1, configCanvas1);
