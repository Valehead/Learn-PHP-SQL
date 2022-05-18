<?php



function filter(array $userData): array
{
    $errors = [];
    
    if(!is_email($userData['email'])){
        $errors['email'] = 'This is not a valid email addresss.';
    };

    if(!good_username($userData['username'])){
        $errors['username'] = 'This is not a valid username. Please use only letters and numbers between 4 and 12 characters.';
    };

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
                $errors['password'] = '';
        };
    };

    if(!unique_email($userData['email'])){
        $errors['email'] = 'This email address is already in use.';
    };

    if(!unique_username($userData['username'])){
        $errors['email'] = 'This username is not available.';
    };


    return [$userData, $errors];
}