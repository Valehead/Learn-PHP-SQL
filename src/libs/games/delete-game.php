<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');

//only allow access to games page if someone is logged in
if(!is_user_logged_in()){
    redirect_to('/Learn-PHP-SQL/accounts/login.php?message=require_login');
};

if($_SERVER['REQUEST_METHOD'] == 'POST'){


    if(isset($_POST['deleteGame']))
    {
        //escape it just in case
        $delGame = $conn->real_escape_string($_POST['deleteGame']);

        //create the query, execute and save the result
        $result = $conn->query("DELETE FROM `games` WHERE `id` = {$delGame};");

        //dont need to add code for deleting gamesPlayed entries because of foreign constraint to cascade on delete
    };

    if($result){
        //redirect to home page
        header('Location:' . '/Learn-PHP-SQL/games/show-games.php');
        
        //close the connection
        $conn->close();
    }
    else{
        //show the error
        echo "Error Ocurred: {$conn->error}";

        //close the connection
        $conn->close();
    };

};

?>