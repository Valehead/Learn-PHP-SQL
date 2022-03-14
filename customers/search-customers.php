<?php
    require_once "../actions/search-customer.php";
    
    //get the id out of the url
    $search = $_GET['searchBox'];


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
        <title>Search Results</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="../index.css">
    </head>
    <body>

    <main class="container mt-5">
        <div class="row">
            <div class="col-5">
                <a href="/Learn-PHP-SQL/"><button class="btn btn-primary">Back to Home</button></a>
            </div>

            <div class="col-4 offset-3">
                <!-- search box -->
                <form action="./search-customers.php" method="get">
                    <div class="my-2 d-flex align-items-center">
                        <input type="text" name="searchBox" id="mySearch" onkeyup="mySearchFilter();" placeholder="Search for Names...">
                        <button type="submit" class="btn btn-secondary btn-sm ms-2" id="submit">Search!</button>
                    </div>
                </form>
                <!-- search box end -->
            </div>
        </div>
        
        <!-- customer search display grid start -->
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Birthday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php search_customers($search); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- customer search display grid start -->


    </main>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>