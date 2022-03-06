<?php
require_once 'config.php';

//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //if the form sent valid data, fill the initialized user with data
    if(isset($_POST['id']) && isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])){
        
        $sql_query = "UPDATE `customers` SET `first-name`={$_POST['first-name']}, `last-name`={$_POST['last-name']}, `phone`={$_POST['phone']}, `email`={$_POST['email']},`birthday`={$_POST['birthday']} WHERE `id`=`{$_POST['id']}`";
        $result = mysqli_query($mysqli, $sql_query);
    };
    
    if($result){
        header('Location: index.php');
    }
    else{
        echo 'Error Ocurred' . mysqli_error($mysqli);
    };

    //close active connection
    mysqli_close($mysqli);

    //works
    // $sql_delete = "DELETE FROM customers WHERE name = 'Bert Reynolds'";
    // $result2 = mysqli_query($mysqli, $sql_delete);
};
?>