<?php
require_once(__DIR__ .'/../config.php');

//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //if the form sent valid data, fill the initialized user with data
    if(isset($_POST['id']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])){
        
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

        //create the update query
        $sql_query = "UPDATE `customers` SET `firstName`='{$customer['firstName']}', `lastName`='{$customer['lastName']}', `phone`='{$customer['phone']}', `email`='{$customer['email']}',`birthday`='{$customer['birthday']}' WHERE id='{$_POST['id']}'";
        
        //execute the query and save the result
        $result = mysqli_query($mysqli, $sql_query);
    };
    
    //return to home page
    if($result){
        header('Location: ../index.php');
    }
    else{
        echo 'Error Ocurred' . mysqli_error($mysqli);
    };

    //close active connection
    mysqli_close($mysqli);

};
?>