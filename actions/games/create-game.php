<?php

//require the sql config data
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');

//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['gameTitle'])){
        //escape the game title
        $trueTitle = $conn->real_escape_string($_POST['gameTitle']);

        //send query save the result
        $result = $conn->query("INSERT INTO `games` (`gameTitle`) VALUES ('{$trueTitle}');");
    };

    //return to games page
    if($result){
        header('Location: ../../games/show-games.php');
        
        //close active connection
        $conn->close();        
    }
    else{
        echo "Error Ocurred: {$conn->error}";

        //close active connection
        $conn->close();        
    };
};


?>