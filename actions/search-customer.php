<?php

require_once(__DIR__ .'/../config.php');


//function to search for a customer
function customer_search($customerId){
    
    //have the functions recognize mysqli as a global variable
    global $mysqli;

    //build the query
    $sql_query = "SELECT * FROM `customers` WHERE `id` = {$customerId}";

    //execute query
    $result = mysqli_query($mysqli, $sql_query);

    //if sql returned something
    if($result){

        //if we got a valid result
        if (mysqli_num_rows($result) > 0) {

            // output the customer data from the query
            $row = mysqli_fetch_assoc($result);
            
            //return the customer
            return $row;
        } else {
            echo "Error!";
        }};

        //close active connection
        mysqli_close($mysqli);
};

?>