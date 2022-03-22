<?php
require_once "config.php";

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//check connection
if($conn->connect_error) {trigger_error('Database connection failed.', E_USER_ERROR);};


?>