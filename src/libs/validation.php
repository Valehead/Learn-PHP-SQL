<?php

//checks if it's an email address
function is_email(string $email): bool
{
    //check if the value is set
    if(!isset($email)){
        return false;
    };

    //run the filtervar for emails
    return filter_var($email, FILTER_VALIDATE_EMAIL);
};


//check if the username meets our requirements
function good_username(string $username): bool
{
    //check is the value is set
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

//check if the passwords match and if they meet our requirements
function good_password(string $password, $password2): int
{

    if(!is_same($password, $password2)){
        return 1;
    };

    if(!is_secure($password)){
        return 2;
    };

    //case 3 is the good one
    return 3;

};

//helper function for checking if something is between 2 strlengths
function is_between(string $data, int $min, int $max): bool
{
    $len = mb_strlen($data);

    return $len >= $min && $len <= $max;
};

//helper function for checking if two values are the same
function is_same(string $data1, string $data2): bool
{
    return $data1 === $data2;
};

//helper function for checking if a value is alphanumeric
function is_alphanumeric(string $data): bool
{
    return ctype_alnum($data);
};

//function for checking our password strengthr equirements
function is_secure(string $data): bool
{
    $pattern = "#.*^(?=.{8,64})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#";
    return preg_match($pattern, $data);
};

//function for checking if the email has already been taken
function unique_email(string $email){
    //check if username already exists
    return is_unique($email, 'users', 'email');
};

//function for checking if the username has already been taken
function unique_username(string $username){
    //check if username already exists
    return is_unique($username, 'users', 'username');
};

//helper function for checking if the data has already been taken in the corresponding field
//reusable for emails and usernames
function is_unique(string $data, string $table, string $column): bool
{
    global $conn;

    $data = $conn->real_escape_string($data);

    $result = $conn->query("SELECT {$column} FROM {$table} WHERE {$column} = '{$data}';");

    return $result->num_rows == 0;
};