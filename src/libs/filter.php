<?php


//function for finding out where the user is screwing up
function filterSignUp(array $userData): array
{
    //initialize the variable
    $errors = [];

    //check if the email address is valid
    if(!is_email($userData['email'])){
        $errors['email'] = 'This is not a valid email addresss.';
    };

    //check if the username is valid
    if(!good_username($userData['username'])){
        $errors['username'] = 'This is not a valid username. Please use only letters and numbers between 4 and 12 characters.';
    };

    //check if the passwords match and meet requirements
    if(isset($userData['password'], $userData['password2'])){
        $i = good_password($userData['password'], $userData['password2']);
        
        switch($i) {
            case 1:
                $errors['password'] = 'The two passwords entered do not match.';
                break;
            case 2:
                $errors['password'] = 'This password does not meet the password requirements. Your password must have between 8 and 64 characters and contain at least one number, one upper case letter, one lower case letter and one special character.';
                break;
            case 3:
                break;
        };
    };

    //check if the email is taken
    if(!unique_email($userData['email'])){
        $errors['email'] = 'This email address is already in use.';
    };

    //check if the username is taken
    if(!unique_username($userData['username'])){
        $errors['username'] = 'This username is not available.';
    };

    //check if the user agreed to the terms
    if(!isset($userData['agree'])){
        $errors['agree'] = 'You must agree to the terms of service in order to create an account.';
    };


    //return the user data and any errors if there are any
    return [$userData, $errors];
};


//function for seeing if the login form was filled out correctly
function filterLogin(array $loginData): array
{
    $errors = [];

    //check if username is set
    if(!isset($loginData['email'])){
        $errors['username'] = 'You must enter an email!';
    };

    //check if password is set
    if(!isset($loginData['password'])){
        $errors['password'] = 'You must enter a password!';
    };

    //return the user data and any errors if there are any
    return [$loginData, $errors];
};


//function to see if activation link is valid
function filterActivation(array $linkData): array
{
    //initialize the variable
    $errors = [];

    //check if the email address is valid
    if(!is_email($linkData['email'])){
        $errors['email'] = 'This is not a valid email addresss.';
    };

    if(!isset($linkData['activation_code'])){
        $errors['activation_code'] = 'This is not a valid activation code.';
    };
    
    //return the user data and any errors if there are any
    return [$linkData, $errors];
};

?>