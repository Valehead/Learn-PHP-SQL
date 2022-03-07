<?php
    require_once "connect.php";
    
    //get the id out of the url
    $customerId = $_GET['id'];

    $customer = customer_search($customerId);

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
        <title>Edit Customer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>



        <main class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="actions/update-customer.php" method="POST">

                                <div class="mb-3">
                                    <label for="id" class="form-label">Customer Id:</label>
                                    <input type="text" name="id" id="id" class="form-control" value="<?php echo $customer['id']; ?>" required readonly>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="first-name" class="form-label">First Name:</label>
                                    <input type="text" name="first-name" id="first-name" class="form-control" value="<?php echo $customer['first-name']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="last-name" class="form-label">Last Name:</label>
                                    <input type="text" name="last-name" id="last-name" class="form-control" value="<?php echo $customer['last-name']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number:</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $customer['phone']; ?>" required>

                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $customer['email']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Birthday:</label>
                                    <input type="date" name="birthday" id="birthday" class="form-control" value="<?php echo $customer['birthday']; ?>" required>
                                </div>

                                <div class="mb-3 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button>
                                    <a href="/php-and-mysql"><button type="button" class="btn btn-secondary" ignore onClick="">Cancel</button></a>
                                    <button type="button" class="btn btn-warning" ignore onClick="">Delete?</button>
                                </div>
                                
                            </form>
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