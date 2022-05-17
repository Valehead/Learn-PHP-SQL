<?php


function register_user(string $email, string $username, string $password, bool $is_admin = false): bool {

    global $conn;
    echo "hi";
    $user = array(
        "email" => $email,
        "username" => $username,
        "password" => $password
    );

    //escape everything and recreate the object
    foreach($user as $key => $value)
    {
        $user[$key] = $conn->real_escape_string($user[$key]);
    };

    $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT);

    //create the insert query, execute the query and save the query result
    $result = $conn->query("INSERT INTO `users` (`email`, `username`, `password`, `is_admin`) 
    VALUES ('{$user['email']}', '{$user['username']}', '{$user['password']}', '{$is_admin}');");
    
    echo $result;

    //return the success or fail
    return $result;

};

?>