<?php

require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');

//for searching games to display on show-games.php
function search_games(){

    global $conn;


    //build and execute the query
    $result = $conn->query("SELECT * FROM `games` ORDER BY `id`;");

    //close active connection
    $conn->close();

    //if we got a valid result....
    if($result){

        //and there is a result including info....
        if($result->num_rows >0){

            //iterate over the data and create rows for each game
            while($row = $result->fetch_assoc()){
                
                echo "<tr id='game'>
                        <th scope='row'><a href='/Learn-PHP-SQL/games/edit-game.php?id={$row['id']}'>{$row['id']}</a></th>
                        <td>{$row['gameTitle']}</td>
                      </tr>";
            };
        //if we get a result from sql but no data
        } else {
            echo "<tr id='game'>
                    <th scope='row'>0</th>
                    <td>No Games Found</td>
                  </tr>";
        };
    };
};

//for searching a singular game for the edit page
function game_search(){
    
    //have the functions recognize conn as a global variable
    global $conn;

    if(isset($_GET['id'])){
        //escape what we get from the edit game url
        $gameId = $conn->real_escape_string($_GET['id']);

        //build and execute query
        $result = $conn->query("SELECT * FROM `games` WHERE `id` = '{$gameId}';");
        
        //close active connection
        $conn->close();

        //if sql returned something
        if($result){

            //if we got a valid result
            if ($result->num_rows > 0) {

                // output the game data from the query
                $row = $result->fetch_assoc();
                
                //return the game
                return $row;

            } else {

                echo "No Game Found!";       

            };
        };
    };
};


//search for games played by a certain customer
function gamesPlayed_search(){
    
    //have the functions recognize conn as a global variable
    global $conn;

    if(isset($_GET['id'])){
        //escape what we get from the edit game url
        $customerId = $conn->real_escape_string($_GET['id']);

        //build and execute query
        $result = $conn->query("SELECT g.gameTitle FROM games g 
                                LEFT JOIN gamesPlayed p ON g.id = p.gameId 
                                WHERE p.customerId = '{$customerId}';");
        
        //close active connection
        $conn->close();

        //if we got a valid result....
        if($result){

            //and there is a result including info....
            if($result->num_rows >0){

                //iterate over the data and create rows for each game
                while($row = $result->fetch_assoc()){
                    
                    echo "<button type='button' class='btn btn-secondary me-2 my-1' disabled>
                            {$row['gameTitle']}
                        </button>";
                };
            //if we get a result from sql but no data
            } else {
                echo "<h6 class='card-subtitle'>
                        No Games Found
                    </h6>";
            };
        };
    };

};

?>