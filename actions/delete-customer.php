<?php
require_once '../connect.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //escape it just in case
    $delItem = $conn->real_escape_string($_POST['deleteItem']);

    if(isset($delItem))
    {
        //create the query, execute and save the result
        $result = $conn->query("DELETE FROM `customers` WHERE `id` = {$delItem};");
    };

    if($result){
        //redirect to home page
        header('Location: ../index.php');
        
        //close the connection
        $conn->close();
    }
    else{
        //show the error
        echo "Error Ocurred: {$conn->error}";

        //close the connection
        $conn->close();
    };

};

?>