<?php
    require_once "../actions/games/search-game.php";
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
        <title>RipNShip Customer Demo - LAMP Stack</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

    <?php include($_SERVER['DOCUMENT_ROOT'] ."/Learn-PHP-SQL/partials/navbar.php") ?>


        <main class="container mt-4">

            <!-- game display grid start -->
            <div class="row mt-5">
                <!-- start of new game form -->
                <div class="col-3 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add a new Game?</h5>

                            <form action="../actions/games/create-game.php" method="POST">
                                <div class="mt-3">
                                    <input type="text" name="gameTitle" id="newGame" placeholder="New Game Title..." required>
                                    <button type="submit" class="btn btn-secondary btn-sm mt-3" id="submit">Add Game!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end of new game form -->

                <div class="col-3">
                <!-- search box -->
                    <input type="text" name="searchBox" id="mySearch" onkeyup="mySearchFilter();" placeholder="Search by Title...">
                <!-- search box end -->
                </div>

                <!-- start of games table -->
                <div class="col-4">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th scope="col">Id#</th>
                                <th scope="col">Game Title <input type="text" name="searchBox" id="mySearch" onkeyup="mySearchFilter();" placeholder="Search by Title..."></th>
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
        


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>