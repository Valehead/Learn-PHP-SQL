<?php


$new_user = [
    "first-name" => "Tiffany",
    "last-name" => "Nitti",
    "phone" => "",
    "email" => "",
    "birthday" => ""
];

$mysqli = mysqli_connect('localhost', 'valehead', 'the4kingdb$', 'ripnship') or die("Connection Failed: " . mysqli_connect_error());
//echo $new_user['first-name'];

$sql_query = "SELECT * FROM customers WHERE `first-name` = '{$new_user['first-name']}'";
// $sql_query = "SELECT * FROM customers WHERE id = 8";
//echo $sql_query;

if($result = mysqli_query($mysqli, $sql_query)){

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["first-name"]. " " . $row["last-name"]. "<br>";
        }
    } else {
        echo "0 results";
    }}


?>