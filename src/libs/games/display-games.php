<?php
// require the sql config data
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');

//function to find and create inputs for all games
function display_games(){

    //have the functions recognize mysqli as a global variable
    global $conn;


    //if there is an id in the url, we should be on the edit customer page
    if(isset($_GET['id'])){

        //save and escape the customer id
        $custId = $conn->real_escape_string($_GET['id']);

        //execute and save query to select all games
        $result = $conn->query("SELECT * FROM `games` ORDER BY `id`;");

        //execute and save second query to select games this user plays
        $result2 = $conn->query("SELECT * FROM `gamesPlayed` WHERE `customerId` = '{$custId}';");
        
        //initialize array for users with no played games
        $gamesPlayed = array();
        //if the data is good, save all the game ids they play into an array
        if(($result2) && ($result2->num_rows > 0)){
            while($row2 = $result2->fetch_assoc()){
                $gamesPlayed[] = $row2['gameId'];
            };
        };

        //close connection
        $conn->close();

        //if there is a result, meaning the query worked
        if($result){

            //then iterate over the results and create the entries
            if ($result->num_rows > 0) {

                // create an entry for the data of each row
                while($row = $result->fetch_assoc()) {

                        echo "<div class='form-check form-check-inline'>
                                <input type='checkbox' name='games[]' id='game{$row['id']}' class='form-check-input' value='{$row['id']}'";
                        
                        //if the current game id matches an entry in the gamesPlayed array, check the box
                        if(in_array($row['id'], $gamesPlayed)){echo "checked";};

                        echo  "><label for='game{$row['id']}Choice' class='form-check-label'>{$row['gameTitle']}</label>
                            </div>";

                };
            } else {
                echo "No Games Found.";
            };
        };

    //this displays all the game inputs for the home index page (adding new customers)
    } else {
        //execute and save query to select all games
        $result = $conn->query("SELECT * FROM `games` ORDER BY `id`;");

        //don't close connection because still needed on index for displaying all customers
        //$conn->close();

        //if there is a result, meaning the query worked
        if($result){

            //then iterate over the results and create the entries
            if ($result->num_rows > 0) {

                // create a card for the data of each row
                while($row = $result->fetch_assoc()) {
                    
                    echo "<div class='form-check form-check-inline'>
                            <input type='checkbox' name='games[]' id='game{$row['id']}' class='form-check-input' value='{$row['id']}'>
                            <label for='game{$row['id']}Choice' class='form-check-label'>{$row['gameTitle']}</label>
                        </div>";
                };
            } else {
                echo "No Games Found.";
            };
        };
    };
};


?>