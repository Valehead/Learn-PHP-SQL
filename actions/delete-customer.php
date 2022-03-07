<?php
require_once '../config.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['deleteItem']))
    {
        $sql_query = "DELETE FROM `customers` WHERE id={$_POST['id']}";
        $result = mysqli_query($mysqli, $sql_query);
    };

    // if($result){
    //     header('Location: ../index.php');
    // }
    // else{
    //     echo 'Error Ocurred' . mysqli_error($mysqli);
    // };

    //close active connection
    mysqli_close($mysqli);
};

?>