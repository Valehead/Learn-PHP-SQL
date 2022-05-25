<?php


function register_user(string $email, string $username, string $password, int $is_admin = 0): bool
{

    global $conn;
    
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
    $result = $conn->query("INSERT INTO `users` (`email`, `username`, `password`, `is_admin`) VALUES ('{$user['email']}', '{$user['username']}', '{$user['password']}', '{$is_admin}');");
    

    //close the connection because the user was created
    $conn->close();


    //return the success or fail
    return $result;

};

function login_user(string $email, string $password): bool
{
    global $conn;

    $login = array(
        "email" => $email,
        "password" => $password
    );

    //escape everything and recreate the object
    foreach($login as $key => $value)
    {
        $login[$key] = $conn->real_escape_string($login[$key]);
    };

    $user = find_user_by_email($login['email']);

    if($user && password_verify($login['password'], $user['password'])){

        session_regenerate_id();
        //test

        $_SESSION['username'] = $user['username'];

        return true;

    };

    return false;

};

function find_user_by_email(string $email)
{
    global $conn;
    
    $result = $conn->query("SELECT `email`, `username`, `password` FROM `users` WHERE `email` = '{$email}';");


    if($result){

        //if we got a valid result
        if ($result->num_rows > 0) {
            // save the customer data from the query
            $user = $result->fetch_assoc();

            return $user;

        } else {
            return;
        };

    };

};


function is_user_logged_in(): bool
{
    return isset($_SESSION['username']);
};


function logout(): void
{
    if(is_user_logged_in()){

        unset($_SESSION['username']);
        session_destroy();

        redirect_to('login.php');
    } else {
        redirect_to('/Learn-PHP-SQL/index.php');
    };

};

?>