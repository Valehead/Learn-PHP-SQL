<?php 
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/libs/accounts/search-accounts.php');

require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');


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
        <title>Accounts</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        
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
        <?php include($_SERVER['DOCUMENT_ROOT'] ."/Learn-PHP-SQL/src/inc/navbar.php") ?>

        <main class="container mt-5">
            <div class="row">
                <div class="col-4 offset-3">
                    <!-- search box -->
                    <form action="accounts.php" method="get">
                        <div class="my-2 d-flex align-items-center">
                            <input type="search" class="form-control" name="searchBox" id="mySearch" onkeyup="mySearchFilter();" placeholder="Search for Names...">
                            <button type="submit" class="btn btn-secondary btn-sm ms-2" id="submit">Search!</button>
                        </div>
                    </form>
                    <!-- search box end -->
                </div>
            </div>
            
            <!-- accounts search display grid start -->
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Active</th>
                                <th scope="col">Creation Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php search_accounts(); ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>