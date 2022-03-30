<?php
    require_once "../actions/games/search-game.php";
    
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>



        <main class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="../actions/games/update-game.php" method="POST">

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
                                    
                                    <form action="../actions/games/delete-game.php" method="post">
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>