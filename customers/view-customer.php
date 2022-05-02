<?php
    require_once "../src/libs/customers/search-customer.php";
    require_once "../src/libs/games/search-game.php";
    
    //get the id out of the url
    //$customerId = $_GET['id'];

    $customer = customer_search();

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
        <title>View Customer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>

    <?php include($_SERVER['DOCUMENT_ROOT'] ."/Learn-PHP-SQL/src/inc/navbar.php") ?>

        <main class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3 d-flex justify-content-between">
                                <h3 class="card-title">Name: <?php echo "{$customer['firstName']} {$customer['lastName']}" ?></h3>
                                <p>Id: <?php echo $customer['id']; ?></p>
                            </div>

                            <div class="mb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><?php echo "Birthday: " . date('F jS',strtotime($customer['birthday'])); ?></li>
                                    <li class="list-group-item"><?php echo "Phone: {$customer['phone']}"; ?></li>
                                    <li class="list-group-item border-bottom"><?php echo "Email address: {$customer['email']}"; ?></li>
                                </ul>
                            </div>

                            <div class="mb-3">
                                <h4 class="card-title text-center">Games Played</h4>
                                <div class="d-flex flex-wrap justify-content-center">
                                    <?php gamesPlayed_search(); ?>                                    
                                </div>
                            </div>

                            <div class="mb-3 d-flex justify-content-between">
                                
                                <a href='edit-customer.php?id=<?php echo $customer['id']; ?>'><button type='button' class='btn btn-warning' name='editCustomer' id='editCustomer'>Edit</button></a>
                                <a href="/Learn-PHP-SQL"><button type="button" class="btn btn-secondary" ignore onClick="">Cancel</button></a>
                                
                            </div>

                        </div>
                        <!-- end of card body -->
                    </div>
                    <!-- end of card -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </main>





        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <script src="" async defer></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>