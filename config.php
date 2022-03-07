<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'valehead');
define('DB_PASSWORD', 'the4kingdb$');
define('DB_NAME', 'ripnship');
 
// Attempt to connect to MySQL database
$mysqli = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Connection Failed: " . mysqli_connect_error());
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
