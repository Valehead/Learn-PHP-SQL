<?php
require_once 'config.php';


//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //initalizes new customer
    $new_user = [
        "first-name" => "",
        "last-name" => "",
        "phone" => "",
        "email" => "",
        "birthday" => ""
    ];

    //if the form sent valid data, fill the initialized user with data
    if(isset($_POST['first-name']) && isset($_POST['last-name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])){
        
        //iterate over the form data and fill the new user
        foreach($new_user as $key => $value){
            $new_user[$key] = $_POST[$key];
        };

        $sql_query = "INSERT INTO `customers` (`first-name`, `last-name`, `phone`, `email`, `birthday`) VALUES ('{$new_user['first-name']}', '{$new_user['last-name']}', '{$new_user['phone']}', '{$new_user['email']}', '{$new_user['birthday']}')";
        $result = mysqli_query($mysqli, $sql_query);
    };
    
    if($result){
        header('Location: index.php');
    }
    else{
        echo 'Error Ocurred';
    };

    //close active connection
    mysqli_close($mysqli);

    //works
    // $sql_delete = "DELETE FROM customers WHERE name = 'Bert Reynolds'";
    // $result2 = mysqli_query($mysqli, $sql_delete);
};


//ignore for now
function does_user_exist($sqlConnection, $new_user){
    $sql_query = "SELECT first-name, last-name FROM customers WHERE first-name LIKE '{$new_user['first-name']}%'";

};


function display_customers(){
    //have the functions recognize mysqli as a global variable
    global $mysqli;

    //my query to select all customers
    $sql_query = "SELECT * FROM customers ORDER BY id";
    //parse the data sql returns
    $result = mysqli_query($mysqli, $sql_query);
    if($result){

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card mb-3' id='customer'>
                    <div class='card-body'>
                    <h4 class='card-title'>Customer Id: {$row['id']}</h4>
                    <div class='card-header' id='first-name'>{$row['first-name']} {$row['last-name']}</div>
                    <ul class='list-group list-group-flush'>
                        <li class='list-group-item' id='phoneNum'>{$row['phone']}</li>
                        <li class='list-group-item' id='email'>{$row['email']}</li>
                        <li class='list-group-item' id='birthday'>{$row['birthday']}</li>
                    </ul>
                    <div class='mt-2 d-flex justify-content-between'>
                        <a href='edit-customer.php?id={$row['id']}'><button type='button' class='btn btn-primary' name='editCustomer' id='editCustomer'>Edit</button></a>
                        <form action='actions/delete-customer.php' method='post'>
                            <button type='submit' class='btn btn-warning' name='deleteItem' value='{$row['id']}' onClick=''>Delete?</button>
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