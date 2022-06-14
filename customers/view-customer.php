<?php
    require_once "../src/libs/customers/search-customer.php";
    require_once "../src/libs/games/search-game.php";
    
    //only allow access to games page if someone is logged in
    if(!is_user_logged_in()){
        header('Location:/Learn-PHP-SQL/accounts/login.php?message=require_login');
        exit;
    };

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    </body>
</html>