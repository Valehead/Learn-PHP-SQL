<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');

//initialize our arrays
$errors = [];
$inputs = [];


//if someone tries to register for an account
if(is_post_request()){

    //set the rules for the fields
    $fields = [
        'email' => 'email|required|email|unique: users, email',
        'username' => 'string|required|alphanumeric|between: 3, 25|unique: users, username',
        'password' => 'string|required|secure',
        'password2' => 'string|required|same: password',
        'agree' => 'string|required'
    ];

    // custom messages for broken rules
    $messages = [
        'password2' => [
            'required' => 'Please enter the password again',
            'same' => 'The password does not match'
        ],
        'agree' => [
            'required' => 'You need to agree to the term of services to register'
        ]
    ];


    //take the form data, and filter through the rules
    //and supply the corresponding messages if there are any errors
    [$inputs, $errors] = filter($_POST, $fields, $messages);

    print_r($errors);

    //if there are any errors, send them back to the registration page with their data and the *error* messages
    if($errors){
        
        //redirect the user back to the same registration page
        //but include their data they already entered along with
        //the corresponding *error* messages
        redirect_with('register.php', [
            'inputs' => $inputs,
            'errors' => $errors
        ]);

    };


    //if there aren't any errors, create the user and send them to the login page
    //along with the positive confirmation message
    if(register_user($inputs['email'], $inputs['username'], $inputs['password'])){

        //function to redirect to the login page with just a supplied message
        redirect_with_message('login.php', 'Your account has been created successfully. Please login here.');

    };

//if the page is loaded with a get request, that means they probably got redirected to
//here by our error functions. This takes their input data out of the session and puts
//it back into the form, as well as displays their *error* messages on screen with flash
} else if (is_get_request()){

    print_r($errors);
    //deconstruct the user inputs and errors from the session
    [$inputs, $errors] = session_flash('inputs', 'errors');

};



?>