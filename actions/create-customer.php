<?php
// require the sql config data
require_once '../config.php';


//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //if the form sent valid data, then insert that user into the database
    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])){

        //create customer shell
        $customer = [
            "firstName" => "",
            "lastName" => "",
            "phone" => "",
            "email" => "",
            "birthday" => ""
        ];

        //escape the form data to hopefully avoid sql ed's sql injection
        foreach($customer as $key => $value){
            $customer[$key] = mysqli_real_escape_string($mysqli, $_POST[$key]);
        };

        //create the insert query
        $sql_query = "INSERT INTO `customers` (`firstName`, `lastName`, `phone`, `email`, `birthday`) VALUES ('{$customer['firstName']}', '{$customer['lastName']}', '{$customer['phone']}', '{$customer['email']}', '{$customer['birthday']}')";
        
        //execute the query and save the query result
        $result = mysqli_query($mysqli, $sql_query);
    };
    
    //return to home page
    if($result){
        header('Location: ../index.php');
    }
    else{
        echo 'Error Ocurred';
    };

    //close active connection
    mysqli_close($mysqli);

};
?>