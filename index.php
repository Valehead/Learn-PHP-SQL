<?php
require_once "connect.php";
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
        <title>test sql</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css">

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

                    //get ALL of the customer info stored in the li's
                    customerInfos = customerCards[i].getElementsByTagName('li');
                
                    //loop over ALL of the info in each card
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


        <main class="container mt-5">
            <div class="row">

            <!-- form container -->
                <div class="col-5" id="entryform">

                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">New Customer:</h3>

                            <form action="actions/create-customer.php" method="POST">

                                <div class="mb-3">
                                    <label for="first-name" class="form-label">First Name:</label>
                                    <input type="text" name="first-name" id="first-name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="last-name" class="form-label">Last Name:</label>
                                    <input type="text" name="last-name" id="last-name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number:</label>
                                    <input type="text" name="phone" id="phone" class="form-control" required>

                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Birthday:</label>
                                    <input type="date" name="birthday" id="birthday" class="form-control" required>
                                </div>

                                <div class="mb-3 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                                    <button type="reset" class="btn btn-warning" value="reset">Reset</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>

                    <!-- search box -->
                    <form action="actions/search-customer.php" method="get">
                        <div class="my-2">
                            <input type="text" name="searchBox" id="mySearch" onkeyup="mySearchFilter();" placeholder="Search for Names...">
                            <button type="submit" class="btn btn-secondary btn-sm" name="submit" id="submit">Search!</button>
                        </div>
                    </form>


                </div>
                <!-- end of form -->

                <div class="col-2" id="spacer">

                </div>

                <div class="col-5" id="customers">
                <?php
                    // call function to find and display all customers
                    display_customers();
                ?>
                </div>
            </div>
        </main>


        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>