<?php
    require_once "../actions/customers/search-customer.php";
    
    //get the id out of the url
    //$search = $_GET['searchBox'];


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
        <link rel="stylesheet" href="../public/stylesheets/index.css">
        
        <script>
            //function for filtering the customer cards being shown
            function mySearchFilter() {
                
                //declare variables
                var input, filter, customerCards, customerInfos, info, i, f, infosValue;

                //get the search input
                input = document.getElementById("mySearch");

                //filter the search
                filter = input.value.toUpperCase();

                //get ALL of the customers
                customerCards = document.querySelectorAll('#customer');

                //loop over ALL the customers
                for (i = 0; i < customerCards.length; i++) {

                    //get ALL of the customer info stored in the td's
                    customerInfos = customerCards[i].getElementsByTagName('td');
                
                    //loop over ALL of the info in each row
                    for(f=0; f < customerInfos.length; f++){

                        //get the data in each element
                        info = customerInfos[f].textContent;

                        if(info) {

                            //make the data uppercase for easy comparison
                            infosValue = info.toUpperCase();
                        };

                        //if the filtered search data exists inside ANY of the customer values
                        if (infosValue.indexOf(filter) > -1) {

                            //set the display to visible and don't check the rest of that customer's values
                            customerCards[i].style.display = "";
                            break;

                        } else {
                            //if no match, hide the customer
                            customerCards[i].style.display = "none";
                        };
                    };
                };                

            };
        </script>    
    </head>
    <body>

    <?php include($_SERVER['DOCUMENT_ROOT'] ."/Learn-PHP-SQL/partials/navbar.php") ?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-5">
                <a href="/Learn-PHP-SQL/"><button class="btn btn-primary">Add New Customer</button></a>
            </div>

            <div class="col-4 offset-3">
                <!-- search box -->
                <form action="search-customers.php" method="get">
                    <div class="my-2 d-flex align-items-center">
                        <input type="search" class="form-control" name="searchBox" id="mySearch" onkeyup="mySearchFilter();" placeholder="Search for Names...">
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
                            <th scope="col">Email address</th>
                            <th scope="col">Birthday</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php search_customers(); ?>
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