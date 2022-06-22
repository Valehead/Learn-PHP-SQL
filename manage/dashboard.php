<?php 
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/libs/reports/admin-graphs.php');


$gameLabels = [];
$gameStats = [];
foreach(get_all_games() as $game){$gameLabels[] = $game[0]; $gameStats[] = $game[1];};

$playerLabels = [];
$playerStats = [];
foreach(how_many_games() as $player){$playerLabels[] = $player[0]; $playerStats[] = $player[1];};

$birthdayLabels = [];
$birthdayStats = [];
foreach(when_most_birthdays() as $birthday){$birthdayLabels[] = date('F', mktime(0, 0, 0, $birthday[0], 10)); $birthdayStats[] = $birthday[1];};

$userLabels = [];
$userStats = [];
foreach(how_many_active() as $user){

    if($user[0]){
        $userLabels[] = 'Active';
    } else {
        $userLabels[] = 'Inactive';
    };

        $userStats[] = $user[1];
    };

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

        <!-- 1st row of graphs -->
            <div class="row mt-5 justify-content-between">

                <div class="col-6">
                    <div class="card shadow p-3 rounded" id="birthdayChartCard">

                        <h2 class="card-title text-center mt-3 mb-2">Customer Birthdays by Month</h2>
                        <div class="card-body">
                            <canvas id="birthdayChart" style="width:100%;max-width:800px"></canvas>
                        </div>
                        
                    </div>
                </div>


                <div class="col-6">
                    <div class="card shadow p-3 rounded" id="playerChartCard">

                        <h2 class="card-title text-center mt-3 mb-2">Customers who Game the Most</h2>

                        <div class="card-body">
                            <canvas id="playerChart" style="width:100%;max-width:800px"></canvas>
                        </div>
                        
                    </div>
                </div>

            </div>

            <!-- 2nd row of graphs -->
            <div class="row mt-5 justify-content-between">

                <div class="col-6">
                    <div class="card shadow p-3 rounded" id="gamesChartCard">

                        <h2 class="card-title text-center mt-3 mb-2">Games Played by our Customers</h2>
                        <div class="card-body">
                            <canvas id="gamesChart" style="width:100%;max-width:800px"></canvas>
                        </div>
                        
                    </div>
                </div>


                <div class="col-6">
                    <div class="card shadow p-3 rounded" id="usersChartCard">

                        <h2 class="card-title text-center mt-3 mb-2">Active Users</h2>
                        <div class="card-body">
                        <div><?php print_r($userLabels);?></div>

                            <canvas id="usersChart" style="width:100%;max-width:800px"></canvas>
                        </div>
                        
                    </div>
                </div>

            </div>


        </main>

        <script>
            //player chart setup and display
            var playerChartCanvas = document.getElementById('playerChart');
            var playerConfigCanvas2 = {
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
                },
                options: {
                    responsive: true,
                }
            };

            var myPlayerChart = new Chart(playerChartCanvas, playerConfigCanvas2);

            //birthday chart setup and display
            var birthdayChartCanvas = document.getElementById('birthdayChart');
            var birthdayConfigCanvas = {
                type: "bar",
                data: {
                    labels: <?php echo json_encode($birthdayLabels); ?>,
                    datasets: [{
                        label: "# of Birthdays",
                        data: <?php echo json_encode($birthdayStats); ?>,
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
                },
                options: {
                    responsive: true,
                }
            };

            var myBirthdayChart = new Chart(birthdayChartCanvas, birthdayConfigCanvas);
            
            //gamez chart setup and display
            var gamesChartCanvas = document.getElementById('gamesChart');
            var gamesConfigCanvas = {
                type: "bar",
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
                },
                options: {
                    responsive: true,
                }
            };
            var myGamesChart = new Chart(gamesChartCanvas, gamesConfigCanvas);
            
            //gamez chart setup and display
            var usersChartCanvas = document.getElementById('usersChart');
            var usersConfigCanvas = {
                type: "bar",
                data: {
                    labels: <?php echo json_encode($userLabels); ?>,
                    datasets: [{
                        label: "# of Users",
                        data: <?php echo json_encode($userStats); ?>,
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
                },
                options: {
                    responsive: true,
                }
            };
            var myUsersChart = new Chart(usersChartCanvas, usersConfigCanvas);
            

        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>