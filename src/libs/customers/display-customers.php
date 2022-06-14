<?php
// require the sql config data
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');

//function to find and create cards for all customers
function display_customers(){

    //have the functions recognize mysqli as a global variable
    global $conn;

    //execute and save query to select all customers
    $result = $conn->query("SELECT * FROM `customers` ORDER BY `id`;");

    //close active connection
    $conn->close();

    //if there is a result, meaning the query worked
    if($result){

        //then iterate over the results and create the cards
        if ($result->num_rows > 0) {

            // create a card for the data of each row
            while($row = $result->fetch_assoc()) {
                $row['birthday'] = date('F jS',strtotime($row['birthday']));
                
                echo "<div class='col'><div class='card mb-3' id='customer'>
                        <div class='card-body'>
                        <h4 class='card-title'>Customer Id: {$row['id']}</h4>
                        <ul class='list-group list-group-flush'>
                            <li class='list-group-item list-group-item-secondary' id='custName'>{$row['firstName']} {$row['lastName']}</li>
                            <li class='list-group-item' id='phoneNum'>Phone: {$row['phone']}</li>
                            <li class='list-group-item' id='email'>Email: {$row['email']}</li>
                            <li class='list-group-item' id='birthday'>Birthday: {$row['birthday']}</li>
                            <li class='list-group-item' id='custId' style='display:none;'>{$row['id']}</li>
                        </ul>
                        <div class='mt-2 mx-5 d-flex justify-content-between'>
                            <a href='customers/view-customer.php?id={$row['id']}'><button type='button' class='btn btn-secondary' name='viewCustomer' id='viewCustomer'>View</button></a>
                            <a href='customers/edit-customer.php?id={$row['id']}'><button type='button' class='btn btn-warning' name='editCustomer' id='editCustomer'>Edit</button></a>
                        </div>
                        </div>
                        </div></div>";
            };
        } else {
            echo "<div class='card'><div class='card-body'><h4 class='card-title'>0 Customers</h4></div></div>";
        };
    };
};


?>