<?php 
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/libs/reports/admin-graphs.php');

$gameLabels = [];
$gameStats = [];
foreach(get_all_games() as $game){$gameLabels[] = $game[0]; $gameStats[] = $game[1];};

$playerLabels = [];
$playerStats = [];
foreach(how_many_games() as $player){$playerLabels[] = $player[0]; $playerStats[] = $player[1];};

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Overview</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    </head>
    <body>
        <?php include($_SERVER['DOCUMENT_ROOT'] ."/Learn-PHP-SQL/src/inc/navbar.php") ?>

        <main class="container mt-5">
            <div class="row justify-content-between">

                <div class="col-6">
                    <div class="card shadow p-3 mt-5 rounded" id="chart1card">

                        <h2 class="card-title text-center mt-3 mb-2">Games Played by our Customers</h2>
                        <button id='doughnut' onclick="change('doughnut')">doughnut</button>
                        <button id='bar' onclick="change('bar')">bar</button>
                        <div class="card-body">
                            <canvas id="chart1" style="width:100%;max-width:800px"></canvas>
                        </div>
                        
                    </div>
                </div>

                <div class="col-6">
                    <div class="card shadow p-3 mt-5 rounded" id="chart2card">

                        <h2 class="card-title text-center mt-3 mb-2">Customers who Game the Most</h2>

                        <div class="card-body">
                            <canvas id="chart2" style="width:100%;max-width:800px"></canvas>
                        </div>
                        
                    </div>
                </div>

            </div>


        </main>

        <script>
            var chartCanvas1 = document.getElementById('chart1');
            var configCanvas1 = {
                type: "doughnut",
                data: {
                    labels: <?php echo json_encode($gameLabels); ?>,
                    datasets: [{
                        label: "# of Customers that Play",
                        data: <?php echo json_encode($gameStats); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.4)',
                            'rgba(54, 162, 235, 0.4)',
                            'rgba(255, 206, 86, 0.4)',
                            'rgba(75, 192, 192, 0.4)',
                            'rgba(153, 102, 255, 0.4)',
                            'rgba(255, 159, 64, 0.4)'
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
            
            var chartCanvas2 = document.getElementById('chart2');
            var configCanvas2 = {
                type: "bar",
                data: {
                    labels: <?php echo json_encode($playerLabels); ?>,
                    datasets: [{
                        label: "# of Games Played",
                        data: <?php echo json_encode($playerStats); ?>,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.4)',
                            'rgba(54, 162, 235, 0.4)',
                            'rgba(255, 206, 86, 0.4)',
                            'rgba(75, 192, 192, 0.4)',
                            'rgba(153, 102, 255, 0.4)',
                            'rgba(255, 159, 64, 0.4)'
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

            var myChart2 = new Chart(chartCanvas2, configCanvas2);

            

            function change(newType) {
                var ctx = document.getElementById("chart1");

                // Remove the old chart and all its event handles
                if (myChart1) {
                    myChart1.destroy();
                }

                // Chart.js modifies the object you pass in. Pass a copy of the object so we can use the original object later
                var temp = configCanvas1;
                temp.type = newType;
                myChart1 = new Chart(ctx, temp);
            };
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>