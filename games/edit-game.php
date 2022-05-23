<?php
    require_once "../src/libs/games/search-game.php";
    
    //get the id out of the url
    //$gameId = $_GET['id'];

    $game = game_search();

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
        <title>Edit Game</title>
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
                            <form action="../src/libs/games/update-game.php" method="POST">

                                <div class="mb-3">
                                    <label for="id" class="form-label">Game Id:</label>
                                    <input type="text" name="id" id="id" class="form-control" value="<?php echo $game['id']; ?>" required readonly>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="gameTitle" class="form-label">Game Title:</label>
                                    <input type="text" name="gameTitle" id="gameTitle" class="form-control" value="<?php echo $game['gameTitle']; ?>" required>
                                </div>

                                <div class="mb-3 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-info" name="submit" id="submit">Update</button>
                                    </form>
                                    <a href="/Learn-PHP-SQL/games/show-games.php"><button type="button" class="btn btn-secondary" ignore onClick="">Cancel</button></a>
                                    
                                    <form action="../src/libs/games/delete-game.php" method="post">
                                        <button type="submit" class="btn btn-danger" name="deleteGame" value="<?php echo $game['id']; ?>" onClick="">Delete?</button>
                                    </form>
                                    
                                </div>
                                
                            <!-- </form> -->
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