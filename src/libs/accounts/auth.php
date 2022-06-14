<?php

//Load Composer's autoloader
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/vendor/autoload.php');


//include these
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Transport;


//function for registering a user
function register_user(string $email, string $username, string $password, string $activation_code, int $expiry = 1 * 24 * 60 * 60, int $is_admin = 0): bool
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

    //create and hash an activation code
    $user['activation_code'] = password_hash($activation_code, PASSWORD_DEFAULT);
    $user['activation_expiry'] = date('Y-m-d H:i:s',  time() + $expiry);


    //create the insert query, execute the query and save the query result
    $result = $conn->query("INSERT INTO `users` (`email`, `username`, `password`, `activation_code`, `activation_expiry`, `is_admin`) 
    VALUES ('{$user['email']}', '{$user['username']}', '{$user['password']}', '{$user['activation_code']}', '{$user['activation_expiry']}', '{$is_admin}');");
    

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

    //check if the password entered is correct and if the user is activated
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
    $result = $conn->query("SELECT `id`, `email`, `username`, `password`, `active` FROM `users` WHERE `email` = '{$email}';");


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


//helper function to check if user is activated
function is_user_active($email): bool
{
    //check if the user exists
    $user = find_user_by_email($email);

    //if we got a result, check if the user is active and return that result
    if($user){

        return (int)$user['active'] === 1;

    } else {

        //if the user doesn't exist, tell them user/pass invalid
        header('Location:/Learn-PHP-SQL/accounts/login.php?message=invalid_login');
        exit;    
    };
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


//create a random activation code
function generate_activation_code(): string
{
    //random bytes gives us a random series of 16 bytes to turn into hex for randomness
    return bin2hex(random_bytes(16));
};


//send the activation link via email
function send_activation_email(string $email, string $activation_code): void
{
    //create the activation link
    $activation_link = "http://10.6.18.57/Learn-PHP-SQL/accounts/activate.php?email={$email}&activation_code={$activation_code}";

    // //set email body
    $message = <<<MESSAGE
            Hi,
            Please click the following link to activate your account:
            $activation_link
            MESSAGE;

    //initialize mail as a new email object
    //setup the email details
    $mail = (new Email())
        ->from('noreply@rhymeswithdallas.com')
        ->to($email)
        ->subject('Welcome to Rhymes with Dallas!')
        ->text($message);


    //dsn string
    $dsn = '***REMOVED***';

    //setup the transport object with the dsn
    $transport = Transport::fromDsn($dsn);

    //create a new mailer object and pass in the transport object
    $mailer = new Mailer($transport);

    //try to send the mail, if not show the error
    try {
        $mailer->send($mail);
    } catch (TransportExceptionInterface $e) {
        echo "error!";
        print_r($e.getDebug());
    };
};


//function to find unverified users
function find_unverified_user(string $email, string $activation_code)
{
    //declare the conn variable for this scope
    global $conn;
    
    //query to find user by email
    $result = $conn->query("SELECT `id`, `activation_code`, `activation_expiry` < now() as expired FROM `users` WHERE `active` = 0 AND `email` = '{$email}';");

    //check for valid result
    if($result){

        //if we got a valid result
        if ($result->num_rows > 0) {

            // save the user data from the query
            $user = $result->fetch_assoc();

            //if already expired, delete the user with the expired code
            if((int)$user['expired'] === 1){

                //delete user by id
                delete_user_by_id($user['id']);

                //return nothing
                return null;
            };

            //verify the code if not expired
            if(password_verify($activation_code, $user['activation_code'])) {
                //return the valid user
                return $user;
            };

        };

    };

    //return nothing
    return null;
};


//function for activating a user
function activate_user(int $user_id): bool
{
    //declare the conn variable for this scope
    global $conn;
    
    //query to find user by email
    $result = $conn->query("UPDATE `users` SET active = 1, activated_at = CURRENT_TIMESTAMP WHERE id='{$user_id}';");

    return $result;
};


//function for deleting bad users
function delete_user_by_id(int $id, int $active = 0)
{
    //declare the conn variable for this scope
    global $conn;
    
    //query to find user by email
    $result = $conn->query("DELETE FROM `users` WHERE `id` = {$id} and `active` = {$activate}");

    return $result;

};

?>