<?php

//tie in our session and all our helper files
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/libs/accounts/register.php');

//don't allow access to signup page if already logged in
if(is_user_logged_in()){
    redirect_to('/Learn-PHP-SQL/index.php');
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
        <title>Register</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    
    <style>
        p {
            font-size: 0.75em;
        }
    </style>
    
    <body>

    <?php include($_SERVER['DOCUMENT_ROOT'] ."/Learn-PHP-SQL/src/inc/navbar.php") ?>

        <main class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-5">
                    <div class="card mt-5">
                        <div class="card-body">
                            <form action="register.php" method="POST">

                                <div class="mb-3 d-flex justify-content-center">
                                    <h2 class="card-title">Sign Up</h2>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control <?= error_class($errors, 'email') ?>"
                                     value="<?= $inputs['email'] ?? '' ?>" required>

                                     <small><?= $errors['email'] ?? '' ?></small>
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" name="username" id="username" class="form-control <?= error_class($errors, 'username') ?>"
                                     value="<?= $inputs['username'] ?? '' ?>" required>

                                     <small><?= $errors['username'] ?? '' ?></small>
                                </div>                                

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" name="password" id="password" class="form-control <?= error_class($errors, 'password') ?>"
                                     value="<?= $inputs['password'] ?? '' ?>" required>

                                     <small><?= $errors['password'] ?? '' ?></small>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="password2" class="form-label">Re-Enter Password:</label>
                                    <input type="password" name="password2" id="password2" class="form-control <?= error_class($errors, 'password2') ?>"
                                     value="<?= $inputs['password'] ?? '' ?>" required>

                                     <small><?= $errors['password'] ?? '' ?></small>
                                </div>

                                <div class="mb-3">
                                    <label for="agree">
                                        <input type="checkbox" name="agree" id="agree" value="checked" <?= $inputs['agree'] ?? '' ?> />
                                        I agree with the <a href="#" title="term of services">terms of service.</a>
                                    </label>
                                    <small><?= $errors['agree'] ?? '' ?></small>
                                </div>

                                <div class="mb-4 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-lg btn-info" name="submit" id="submit">Register!</button>
                                    </form>                                    
                                    
                                </div>

                                <p>Already have an account? <a href="login.php">Login Here.</a></p>
                                
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