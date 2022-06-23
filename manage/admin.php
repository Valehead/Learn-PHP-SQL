<?php 
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/libs/reports/admin-graphs.php');


//only allow access to games page if someone is logged in and an admin
if(!is_user_an_admin()){
    redirect_to('/Learn-PHP-SQL/index.php?message=require_admin');
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
        <title>Admin</title>
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
                            <canvas id="usersChart" style="width:100%;max-width:800px"></canvas>
                        </div>
                        
                    </div>
                </div>

            </div>


        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>