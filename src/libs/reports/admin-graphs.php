<?php

require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');


//for searching games to display on show-games.php
function get_all_games(){

    global $conn;


    //build and execute the query
    $result = $conn->query("SELECT * FROM `games` ORDER BY `id`;");

    //close active connection
    $conn->close();

    //if we got a valid result....
    if($result){

        //and there is a result including info....
        if($result->num_rows >0){

            return $result;
        //if we get a result from sql but no data
        } else {
            echo "<tr id='game'>
                    <th scope='row'>0</th>
                    <td>No Games Found</td>
                  </tr>";
        };
    };
};

?>