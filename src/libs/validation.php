<?php


const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'The %s is required',
    'email' => 'The %s is not a valid email address',
    'min' => 'The %s must have at least %s characters',
    'max' => 'The %s must have at most %s characters',
    'between' => 'The %s must have between %d and %d characters',
    'same' => 'The %s must match with %s',
    'alphanumeric' => 'The %s should have only letters and numbers',
    'secure' => 'The %s must have between 8 and 64 characters and contain at least one number, one upper case letter, one lower case letter and one special character',
    'unique' => 'The %s already exists',
];


function is_email(string $email): bool
{
    if(!isset($email)){
        return false;
    };

    return filter_var($email, FILTER_VALIDATE_EMAIL);
};

function good_username(string $username): bool
{
    if(!isset($username)){
        return false;
    };
    //if the username is alphanumeric and between 4 and 12 char it's good for now

    if(is_alphanumeric($username)){
        return is_between($username, 4, 12);
    }
    else{
        return false;
    };

};

function good_password(string $password, $password2): bool
{
    if(!isset($password, $password2)){
        return false;
    };

    if(!is_same($password, $password2)){
        return false;
    };

    if(!is_secure($password)){
        return false;
    };

    return true;

};

function is_between(string $data, int $min, int $max): bool
{
    $len = mb_strlen($data);
    return $len >= $min && $len <= $max;
};


function is_same(string $data1, string $data2): bool
{
    return $data1 === $data2;
};


function is_alphanumeric(string $data): bool
{
    return ctype_alnum($data);
};


function is_secure(string $data): bool
{
    $pattern = "#.*^(?=.{8,64})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
    return preg_match($pattern, $data);
};

function unique_email(string $email){
    //check if username already exists
    return is_unique($email, 'users', 'email');
};

function unique_username(string $username){
    //check if username already exists
    return is_unique($username, 'users', 'username');
};

function is_unique(string $data, string $table, string $column): bool
{
    global $conn;

    $sql = "SELECT $column FROM $table WHERE $column = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $data);

    $stmt->execute();

    //print_r($stmt->get_result());
    //$temp = $stmt->num_rows == 0;
    //echo $temp;

    return $stmt->num_rows == 0;
};