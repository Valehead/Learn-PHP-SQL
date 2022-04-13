<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');

//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //if the form sent valid data, fill the initialized game with data
    if(isset($_POST['id']) && isset($_POST['gameTitle'])){
        
        $game = array(
            "id" => "",
            "gameTitle" => ""
        );
    
        //escape everything and recreate the object
        foreach($_POST as $key => $value)
        {
            $game[$key] = $conn->real_escape_string($value);
        };

        //create the update query and execute
        $result = $conn->query("UPDATE `games` SET `gameTitle`='{$game['gameTitle']}' WHERE id='{$game['id']}';");

    };
    
    //return to home page
    if($result){
        header('Location: /Learn-PHP-SQL/actions/games/show-games.php');
        
        //close the connection
        $conn->close();
    }
    else{
        echo "Error Ocurred: {$conn->error}";

        //close the connection
        $conn->close();
    };

};
?>