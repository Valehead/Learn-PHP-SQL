<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');

//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //if the form sent valid data, fill the initialized user with data
    if(isset($_POST['id']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])){
        
        $cust = array(
            "id" => "",
            "firstName" => "",
            "lastName" => "",
            "phone" => "",
            "phone" => "",
            "email" => "",
            "birthday" => ""
        );
    
        //escape everything and recreate the object
        foreach($_POST as $key => $value)
        {
            $cust[$key] = $conn->real_escape_string($value);
        };

        //create the update query and execute
        $result = $conn->query("UPDATE `customers` SET `firstName`='{$cust['firstName']}', `lastName`='{$cust['lastName']}', `phone`='{$cust['phone']}', `email`='{$cust['email']}',`birthday`='{$cust['birthday']}' WHERE id='{$cust['id']}';");

        //reset all games played for this user
        $clearResult = $conn->query("DELETE FROM `gamesPlayed` WHERE `customerId` = '{$cust['id']}';");

        //try to import games if any
        if(isset($_POST['games'])){
            
            //escape all game data just in case and insert a record into gamesPlayed for each game the new
            //customer plays
            foreach($_POST['games'] as $key => $value){
                
                //escape the gameid
                $gameId = $conn->real_escape_string($value);

                //build and execute the query
                $result2 = $conn->query("INSERT INTO `gamesPlayed` (`customerId`, `gameId`) VALUES ('{$cust['id']}', '{$gameId}');");
                
            };
        
        };

    };
    
    //return to home page
    if($result){
        header('Location:' . '/Learn-PHP-SQL/index.php');
        
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