<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');

//initialize our arrays
$errors = [];
$inputs = [];

if(is_post_request()){

    //take the form data, and filter through the rules
    //and supply the corresponding messages if there are any errors
    [$inputs, $errors] = filterLogin($_POST);

    
    //if there are any errors, send them back to the login page with their data and the *error* messages
    if($errors){
        
        //close connection because errors mean we're done
        $conn->close();
        //redirect the user back to the same login page
        //and tell them something is wrong, but don't tell them what for security
        redirect_to('login.php?message=invalid_login');

    };


    //if there aren't any errors, create the user and send them to the login page
    //along with the positive confirmation message
    if(login_user($inputs['email'], $inputs['password'])){

        //function to redirect to the login page with just a supplied message
        redirect_to('/Learn-PHP-SQL/index.php');

    } else {
        //function to redirect to the login page with just a supplied message
        redirect_to('login.php?message=invalid_login');
    };

//if the page is loaded with a get request, that means they probably got redirected to
//here by our error functions. This takes their input data out of the session and puts
//it back into the form, as well as displays their *error* messages on screen with flash
} else if (is_get_request()){

    //deconstruct the user inputs and errors from the session
    [$inputs, $errors] = session_flash('inputs', 'errors');

};
?>



