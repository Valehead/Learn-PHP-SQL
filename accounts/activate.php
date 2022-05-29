<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');

if(is_get_request()){

    //sanitize the email & activation code
    [$inputs, $errors] = filterActivation($_GET);

    //if there aren't any problems
    if (!$errors) {

        //look for the unverified user
        $user = find_unverified_user($inputs['email'], $inputs['activation_code']);

        // if the user exists and we activate the user successfully
        if ($user && activate_user($user['id'])) {
            
            //welcome them and tell them to login!
            redirect_to('login.php?message=welcome');
        };
    } else {

        // redirect to the registration page if there is an issue
        redirect_to('register.php?message=register');
    };

};

// redirect to the registration page in all other cases
redirect_to('register.php');



?>