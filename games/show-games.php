<?php
require_once "../src/libs/games/search-game.php";
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');

//only allow access to games page if someone is logged in
if(!is_user_logged_in()){
    redirect_to('/Learn-PHP-SQL/accounts/login.php');
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
        <title>RipNShip Games</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <script>
            //function for filtering the customer cards being shown
            function mySearchFilter() {
                
                //declare variables
                var input, filter, gameRows, gameTitles, info, i, f, infosValue;

                //get the search input
                input = document.getElementById("mySearch");

                //filter the search
                filter = input.value.toUpperCase();

                //get ALL of the customers
                gameRows = document.querySelectorAll('#game');

                //loop over ALL the customers
                for (i = 0; i < gameRows.length; i++) {

                    //get ALL of the customer info stored in the td's
                    gameTitles = gameRows[i].getElementsByTagName('td');
                
                    //loop over ALL of the info in each row
                    for(f=0; f < gameTitles.length; f++){

                        //get the data in each element
                        info = gameTitles[f].textContent;

                        if(info) {

                            //make the data uppercase for easy comparison
                            infosValue = info.toUpperCase();
                        };

                        //if the filtered search data exists inside ANY of the customer values
                        if (infosValue.indexOf(filter) > -1) {

                            //set the display to visible and don't check the rest of that customer's values
                            gameRows[i].style.display = "";
                            break;

                        } else {
                            //if no match, hide the customer
                            gameRows[i].style.display = "none";
                        };
                    };
                };                

            };
        </script> 
    </head>

    <body>

    <?php include($_SERVER['DOCUMENT_ROOT'] ."/Learn-PHP-SQL/src/inc/navbar.php") ?>


        <main class="container mt-4">

            <!-- start navigation row -->
            <div class="row mb-2 d-flex align-items-center justify-content-between">

                <div class="col-4 offset-8">
                <!-- search box -->
                    <input type="text" name="searchBox" id="mySearch" onkeyup="mySearchFilter();" placeholder="Search by Title...">
                <!-- search box end -->
                </div>

            </div>
            <!-- end navigation row -->

            <!-- game display grid start -->
            <div class="row mt-5">
                <!-- start of new game form -->
                <div class="col-4 offset-2">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add a new Game?</h5>

                            <form action="../src/libs/games/create-game.php" method="POST">
                                <div class="mt-3">
                                    <input type="search" class="form-control" name="gameTitle" id="newGame" placeholder="New Game Title..." required>
                                    <button type="submit" class="btn btn-secondary btn-sm mt-3 d-block" id="submit">Add Game!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end of new game form -->


                <!-- start of games table -->
                <div class="col-3 offset-2">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th scope="col">Id#</th>
                                <th scope="col">Game Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php search_games(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- end of games table -->

            </div>
            <!-- game display grid end -->


        </main>
        


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>