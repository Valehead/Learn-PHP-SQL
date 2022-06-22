<?php

//require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');


//for searching games to display on show-games.php
function get_all_games(){

    global $conn;


    //build and execute the query
    $result = $conn->query("SELECT g.gameTitle, COUNT(*) as count FROM games g 
                            right JOIN gamesPlayed p 
                            on g.id = p.gameId
                            GROUP BY g.gameTitle
                            ORDER BY count desc;");


    //if we got a valid result....
    if($result){

        //and there is a result including info....
        if($result->num_rows >0){
            return $result->fetch_all(MYSQLI_NUM);
        //if we get a result from sql but no data
        };
    };
    return;
};



//who plays the most games
function how_many_games(){

    global $conn;


    //build and execute the query
    $result = $conn->query("SELECT CONCAT_WS(' ', c.firstName, c.lastName) AS `whole_name`, COUNT(p.customerId) as count FROM customers c 
                            right JOIN gamesPlayed p 
                            on c.id = p.customerId
                            GROUP BY whole_name 
                            ORDER BY count desc;");


    //if we got a valid result....
    if($result){

        //and there is a result including info....
        if($result->num_rows >0){
            return $result->fetch_all(MYSQLI_NUM);
        };
    };
    return;
};



//customer birthdays graph
function when_most_birthdays(){

    global $conn;


    //build and execute the query
    $result = $conn->query("SELECT MONTH(birthday) AS birthmonth, COUNT(*) as count
                            FROM customers
                            GROUP by birthmonth
                            order by birthmonth asc;");


    //if we got a valid result....
    if($result){

        //and there is a result including info....
        if($result->num_rows >0){
            return $result->fetch_all(MYSQLI_NUM);
        };
    };
    return;
};


//active users graph
function how_many_active(){

    global $conn;


    //build and execute the query
    $result = $conn->query("SELECT active, COUNT(*) as count
                            FROM users
                            GROUP by active
                            order by count asc;");


    //if we got a valid result....
    if($result){

        //and there is a result including info....
        if($result->num_rows >0){
            return $result->fetch_all(MYSQLI_NUM);
        };
    };
    return;
};

?>