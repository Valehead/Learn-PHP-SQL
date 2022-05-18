<?php
// require the sql config data
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');


//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //if the form sent valid data, then insert that user into the database
    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])){
        
        $cust = array(
            "firstName" => "",
            "lastName" => "",
            "phone" => "",
            "phone" => "",
            "email" => "",
            "birthday" => ""
        );
    
        //escape everything and recreate the object
        foreach($cust as $key => $value)
        {
            $cust[$key] = $conn->real_escape_string($_POST[$key]);
        };
    
        //create the insert query, execute the query and save the query result
        $result = $conn->query("INSERT INTO `customers` (`firstName`, `lastName`, `phone`, `email`, `birthday`) VALUES ('{$cust['firstName']}', '{$cust['lastName']}', '{$cust['phone']}', '{$cust['email']}', '{$cust['birthday']}');");
        
        $newCustId = $conn->insert_id;

        //try to import games if any
        if(isset($_POST['games'])){
            
            //escape all game data just in case and insert a record into gamesPlayed for each game the new
            //customer plays
            foreach($_POST['games'] as $key => $value){
                
                //escape the gameid
                $gameId = $conn->real_escape_string($value);

                //build and execute the query
                $result2 = $conn->query("INSERT INTO `gamesPlayed` (`customerId`, `gameId`) VALUES ('{$newCustId}', '{$gameId}');");
            };
        
        };
    };
    
    //return to home page
    if($result){
        header('Location:' . $_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/index.php');
        
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