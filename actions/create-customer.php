<?php
// require the sql config data
require_once '../connect.php';


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
        foreach($_POST as $key => $value)
        {
            $cust[$key] = $conn->real_escape_string($value);
        };
    
        //create the insert query, execute the query and save the query result
        $result = $conn->query("INSERT INTO `customers` (`firstName`, `lastName`, `phone`, `email`, `birthday`) VALUES ('{$cust['firstName']}', '{$cust['lastName']}', '{$cust['phone']}', '{$cust['email']}', '{$cust['birthday']}');");
        
    };
    
    //return to home page
    if($result){
        header('Location: ../index.php');
        
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