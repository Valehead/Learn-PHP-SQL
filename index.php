<?php
    require_once "src/libs/customers/display-customers.php";
    require_once "src/libs/games/display-games.php";

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
        <title>RipNShip Customer Demo - LAMP Stack</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="public/stylesheets/index.css">

        <script src="public/js/searchLiveFilter.js"></script>
        <script src="public/js/newCustForm.js"></script>
    </head>
    <body>
        
        <?php include("src/inc/navbar.php") ?>

        <main class="container mt-4">

        <?php if(isset($_GET['message']) && $_GET['message'] == 'require_admin'){ ?>

            <!-- start of header row -->
            <div class="row mb-1">

                    <div class="mb-3 d-flex justify-content-center">
                        <h6 class="card-title" style="color: red;">You do not have the required permissions to view this page.<BR>Please contact the site administrator if you think this is incorrect.</h6>
                    </div>

            </div>
            <!-- end of haeder row -->
        <?php }; ?> 

            <!-- start of content row -->
            <div class="row">

                <!-- new customer form container -->
                <div class="col-5" id="entryform">

                    <!-- add new customer card -->
                    <div class="card my-2">

                        <!-- start of card body -->
                        <div class="card-body" id="newCustCard">
                            
                            <!-- start of new customer form -->
                            <form action="src/libs/customers/create-customer.php" method="POST" class="needs-validation" novalidate>
                                
                                <!-- start of customer info -->
                                <div id="newCustInfo">
                                    <h3 class="card-title mb-3">New Customer:</h3>

                                    <div class="mb-3 form-floating">
                                        <input type="text" name="firstName" id="firstName" class="form-control" placeholder="John" required>                                        
                                        <label for="firstName">First Name</label>
                                    </div>

                                    <div class="mb-3 form-floating">
                                        <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Smith" required>
                                        <label for="lastName">Last Name</label>
                                    </div>

                                    <div class="mb-3 form-floating">
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="123-456-7890" required>
                                        <label for="phone">Phone Number</label>
                                    </div>

                                    <div class="mb-3 form-floating">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com" required>
                                        <label for="email">Email address</label>
                                    </div>

                                    <div class="mb-3 form-floating">
                                        <input type="date" name="birthday" id="birthday" class="form-control" placeholder="01/01/2001" required>
                                        <label for="birthday">Birthday</label>
                                    </div>

                                    <div class="mb-3 d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary" id="newCustNext" >Next</button>
                                        <button type="reset" class="btn btn-outline-dark" value="reset">Reset</button>
                                    </div>
                                </div>
                                <!-- end of customer info -->

                                <!-- start of games choices -->
                                <div id="newCustGames">

                                    <h3 class="card-title mb-3">What games do they play?</h3>

                                    <!-- game boxes container -->
                                    <div id="gameBoxes" class="mb-4">

                                        <?php display_games(); ?>

                                    </div>
                                    <!-- end of game boxes container -->

                                    <div class="mb-3 d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary" onclick="showNewCustInfo();">Back</button>
                                        <button type="submit" class="btn btn-success" id="submit">Submit</button>
                                    </div>

                                </div>
                                <!-- end of games choices -->
                                
                            </form>
                            <!-- end of form -->
                        </div>
                        <!-- end of card body -->
                    </div>
                    <!-- end of new customer card -->

                </div>
                <!-- end of column -->

                <!-- start of spacer -->
                <div class="col-2" id="spacer">

                </div>
                <!-- end of spacer -->

                <!-- start of customer tiles -->
                <div class='col-5' id='customers-container'>

                    <form action="customers/search-customers.php" method="get">
                        <div class="my-2 d-flex align-items-center justify-content-between">
                            <input type="search" class="form-control" name="searchBox" id="mySearch" onkeyup="mySearchFilter();" placeholder="Search for Names...">
                            <button type="submit" class="btn btn-secondary btn-sm" id="submit">Search!</button>
                        </div>
                    </form>
                    
                    <div id="customers">
                        <?php
                            // call function to find and display all customers
                            display_customers();
                        ?>
                    </div>


                </div>
                <!-- end of customer tiles -->
            </div>
            <!-- end of row -->
        </main>


        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        <script src="public/js/newCustValidation.js"></script>
    </body>
</html>
