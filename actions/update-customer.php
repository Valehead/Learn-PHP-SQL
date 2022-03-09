<?php
require_once(__DIR__ .'/../config.php');

//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //if the form sent valid data, fill the initialized user with data
    if(isset($_POST['id']) && isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])){
        
        //create the update query
        $sql_query = "UPDATE `customers` SET `firstName`='{$_POST['firstName']}', `lastName`='{$_POST['lastName']}', `phone`='{$_POST['phone']}', `email`='{$_POST['email']}',`birthday`='{$_POST['birthday']}' WHERE id='{$_POST['id']}'";
        
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