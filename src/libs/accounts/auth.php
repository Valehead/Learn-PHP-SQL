<?php

//function for registering a user
function register_user(string $email, string $username, string $password, int $is_admin = 0): bool
{

    //declare the conn variable for this scope
    global $conn;
    
    //initalize an array with user inputted data
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

    //hash user password before storage
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
    //declare the conn variable for this scope
    global $conn;

    //initalize user array for sign in
    $login = array(
        "email" => $email,
        "password" => $password
    );

    //escape everything and recreate the object
    foreach($login as $key => $value)
    {
        $login[$key] = $conn->real_escape_string($login[$key]);
    };

    //check if the user exists
    $user = find_user_by_email($login['email']);

    //check if the password entered is correct
    if($user && password_verify($login['password'], $user['password'])){

        //regen the session
        session_regenerate_id();

        //set the session variables to track that the user is logged in
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];

        //return true if login was successful
        return true;

    };

    //return false if the password didn't match or the user wasn't found
    return false;

};


//function for finding a user by email
function find_user_by_email(string $email)
{
    //declare the conn variable for this scope
    global $conn;
    
    //query to find user by email
    $result = $conn->query("SELECT `id`, `email`, `username`, `password` FROM `users` WHERE `email` = '{$email}';");


    if($result){

        //if we got a valid result
        if ($result->num_rows > 0) {

            // save the customer data from the query
            $user = $result->fetch_assoc();

            //return the user data
            return $user;

        } else {

            //if no user exists, return nothing
            return;

        };

    } else {

        //if we don't get anything back from sql
        return;

    };

};

//helper function to check if user is logged in
function is_user_logged_in(): bool
{
    return isset($_SESSION['username']);
};

//function to log out the user
function logout(): void
{
    if(is_user_logged_in()){

        //unset the variable saved in the session
        unset($_SESSION['username']);

        //destroy the session itself
        session_destroy();

        //send them to the login page
        redirect_to('login.php');

    } else {

        //otherwise send them to the home page
        redirect_to('/Learn-PHP-SQL/index.php');
    };

};

?>