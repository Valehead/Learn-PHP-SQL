<?php
require_once(__DIR__ .'/../connect.php');

//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //if the form sent valid data, fill the initialized user with data
    if(isset($_POST['id']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])){
        
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

        //create the update query and execute
        $result = $conn->query("UPDATE `customers` SET `firstName`='{$cust['firstName']}', `lastName`='{$cust['lastName']}', `phone`='{$cust['phone']}', `email`='{$cust['email']}',`birthday`='{$cust['birthday']}' WHERE id='{$_POST['id']}';");

    };
    
    //return to home page
    if($result){
        header('Location: ../index.php');
        
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