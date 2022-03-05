<?php



//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //connect to the database
    $mysqli = connect_to_sql();

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

        //if(does_user_exist($mysqli, $new_user))

        $sql_query = "INSERT INTO `customers` (`first-name`, `last-name`, `phone`, `email`, `birthday`) VALUES ('{$new_user['first-name']}', '{$new_user['last-name']}', '{$new_user['phone']}', '{$new_user['email']}', '{$new_user['birthday']}')";
        echo $sql_query . "\n";
        $result = mysqli_query($mysqli, $sql_query);
    };
    
    if($result){
        echo 'Entry Successfull, Welcome!';
    }
    else{
        echo 'Error Ocurred';
    };


    //works
    // $sql_delete = "DELETE FROM customers WHERE name = 'Bert Reynolds'";
    // $result2 = mysqli_query($mysqli, $sql_delete);
};



function does_user_exist($sqlConnection, $new_user){
    $sql_query = "SELECT first-name, last-name FROM customers WHERE first-name LIKE '{$new_user['first-name']}%'";

};

function connect_to_sql(){
    return mysqli_connect('localhost', 'valehead', 'the4kingdb$', 'ripnship') or die("Connection Failed: " . mysqli_connect_error());
};

function display_customers(){
    //open the connection
    $mysqli = connect_to_sql();

    //my query to select all customers
    $sql_query = "SELECT * FROM customers";
    echo $mysqli;
    //parse the data sql returns
    if($result = mysqli_query($mysqli, $sql_query)){

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card' id='customers'>
                    <div class='card-body'>
                    <h4 class='card-title'>Customer Id: {$row['id']}</h4>
                    <div class='card-header' id='first-name'>{$row['first-name']}</div>
                    <div class='card-header' id='last-name'>{$row['last-name']}</div>
                    <ul class='list-group list-group-flush'>
                    <li class='list-group-item' id='phoneNum'>{$row['phone']}</li>
                    <li class='list-group-item' id='email'>{$row['email']}</li>
                    <li class='list-group-item' id='birthday'>{$row['birthday']}</li>
                    </ul>
                    </div>
                    </div>";
            }
        } else {
            echo "<div class='card'><div class='card-body'><h4 class='card-title'>0 Customers</h4></div></div>";
        }}


    echo "<div class='card' id='customers'>
    <div class='card-body'>
    <div class='card-header' id='first-name'>'Nick'</div>
    <div class='card-header' id='last-name'>'Vales'</div>
    <ul class='list-group list-group-flush'>
    <li class='list-group-item' id='phoneNum'>'631-405-8064'</li>
    <li class='list-group-item' id='email'></li>
    <li class='list-group-item' id='birthday'></li>
    <li class='list-group-item' id='idNum'></li>
    </ul>
    </div>
    </div>";
};


?>