<?php
// require the sql config data
//require_once '../config.php';
require_once(__DIR__ .'/../config.php');

//function to find and create cards for all customers
function display_customers(){

    //have the functions recognize mysqli as a global variable
    global $mysqli;

    //query to select all customers
    $sql_query = "SELECT * FROM customers ORDER BY id";

    //execute the query and save the result
    $result = mysqli_query($mysqli, $sql_query);

    //if there is a result, meaning the query worked
    if($result){

        //then iterate over the results and create the cards
        if (mysqli_num_rows($result) > 0) {

            // create a card for the data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card mb-3' id='customer'>
                    <div class='card-body'>
                    <h4 class='card-title'>Customer Id: {$row['id']}</h4>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item list-group-item-secondary' id='custName'>{$row['firstName']} {$row['lastName']}</li>
                        <li class='list-group-item' id='phoneNum'>{$row['phone']}</li>
                        <li class='list-group-item' id='email'>{$row['email']}</li>
                        <li class='list-group-item' id='birthday'>{$row['birthday']}</li>
                        <li class='list-group-item' id='custId' style='display:none;'>{$row['id']}</li>
                    </ul>
                    <div class='mt-2 d-flex justify-content-between'>
                        <a href='customers/edit-customer.php?id={$row['id']}'><button type='button' class='btn btn-primary' name='editCustomer' id='editCustomer'>Edit</button></a>
                        <form action='actions/delete-customer.php' method='post'>
                            <button type='submit' class='btn btn-danger' name='deleteItem' value='{$row['id']}' onClick=''>Delete?</button>
                        </form>
                    </div>
                    </div>
                    </div>";
            }
        } else {
            echo "<div class='card'><div class='card-body'><h4 class='card-title'>0 Customers</h4></div></div>";
        }};

        //close active connection
        mysqli_close($mysqli);

};



?>