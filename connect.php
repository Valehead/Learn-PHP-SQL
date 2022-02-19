<?php

// $new_user = [
//     "name" => "",
//     "phone" => "",
//     "email" => "",
//     "birthday" => ""
// ];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $mysqli = mysqli_connect('localhost', 'valehead', 'the4kingdb$', 'ripnship') or die("Connection Failed: " . mysqli_connect_error());

    if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['birthday'])){
        // foreach($new_user as $key => $value){
        //     $new_user[$key] = $_POST[$key];
        // };
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];

    //$sql_query = "INSERT INTO `customers` (`name`, `phone`, `email`, `birthday`) VALUES ('{$new_user['name']}', '{$new_user['phone']}', '{$new_user['email']}', '{$new_user['birthday']}')";
    $sql_query = "INSERT INTO `customers` (`name`, `phone`, `email`, `birthday`) VALUES ('{$name}', '{$phone}', '{$email}', '{$birthday}')";
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

?>