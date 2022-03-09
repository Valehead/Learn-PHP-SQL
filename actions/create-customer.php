<?php
// require the sql config data
require_once '../config.php';


//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //if the form sent valid data, fill the initialized user with data
    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])){

        //create the insert query
        $sql_query = "INSERT INTO `customers` (`firstName`, `lastName`, `phone`, `email`, `birthday`) VALUES ('{$_POST['firstName']}', '{$_POST['lastName']}', '{$_POST['phone']}', '{$_POST['email']}', '{$_POST['birthday']}')";
        
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