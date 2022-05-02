<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');


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
        header('Location: ../../games/show-games.php');
        
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