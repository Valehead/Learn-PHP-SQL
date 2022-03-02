<?php



//check if there is a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //connect to the database
    $mysqli = mysqli_connect('localhost', 'valehead', 'the4kingdb$', 'ripnship') or die("Connection Failed: " . mysqli_connect_error());

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



?>