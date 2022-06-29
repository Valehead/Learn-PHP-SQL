<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/connect.php');


function search_accounts(){

    //have the functions recognize conn as a global variable
    global $conn;

    //if the form sent valid data, get the search query out of the url
    if(isset($_GET['searchBox'])){

        $searchInput = $conn->real_escape_string($_GET['searchBox']);

        //----------------the following chunk of code is for dynamically generating the search query
        $columns = $conn->query("SELECT `COLUMN_NAME` FROM information_schema.COLUMNS WHERE `TABLE_NAME` = 'users' AND `TABLE_SCHEMA` = 'ripnship'");

        //build ending like clauses of query for every column in the table
        //doing this accounts for table growth without having to edit this to search new columns
        $queryAllColumns = array();

        while ($column = $columns->fetch_assoc()) {
            $queryAllColumns[] = "`{$column['COLUMN_NAME']}` LIKE '%{$searchInput}%'";
        };

        //create the full select query to search for the input in all customer columns
        $sql_query = "SELECT `id`, `email`, `username`, `is_admin`, `active`, `created_at`
         FROM `users` WHERE " . implode(" OR ", $queryAllColumns) . ";";
        //---------------chunk end

        /*
        if you want to manually make the query and not have it change alongside db changes
        you can use the following:

        $sql_query = "SELECT * FROM `users`
                     WHERE `id` LIKE '%{$searchInput}%'
                      OR `email` LIKE '%{$searchInput}%'
                       OR `username` LIKE '%{$searchInput}%'
                        OR `is_admin` LIKE '%{$searchInput}%'
                         OR `active` LIKE '%{$searchInput}%'
                          OR `created_at` LIKE '%{$searchInput}%';";
        */

        //execute the query and save the query result
        $result = $conn->query($sql_query);

        //close active connection
        $conn->close();        

        //if there is a result, meaning the query worked
        if($result){

            //then iterate over the results and create the cards
            if ($result->num_rows > 0) {

                // create a card for the data of each row
                while($row = $result->fetch_assoc()) {
                    print_r($row);
                echo "<tr id='customer'>
                        <th scope='row'><a href='/Learn-PHP-SQL/manage/users/edit-user.php?id={$row['id']}'>{$row['id']}</a></th>
                        <td>{$row['email']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['is_admin']}</td>
                        <td>{$row['active']}</td>
                        <td>{$row['created_at']}</td>
                    </tr>";
                };
            } else {
                echo "<tr>
                <th scope='row'>0</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>";
            };
        };

        //if no search query is given, aka they just went to the show all page
    } else {

        //create the full select query to search for the input in all customer columns
        $sql_query = "SELECT `id`, `email`, `username`, `is_admin`, `active`, `created_at` FROM `users`;";
        //---------------chunk end


        /*
        if you want to manually make the query and not have it change alongside db changes
        you can use the following:

        $sql_query = "SELECT * FROM `customers`
                     WHERE `id` LIKE '%{$searchInput}%'
                      OR `firstName` LIKE '%{$searchInput}%'
                       OR `lastName` LIKE '%{$searchInput}%'
                        OR `phone` LIKE '%{$searchInput}%'
                         OR `email` LIKE '%{$searchInput}%'
                          OR `birthday` LIKE '%{$searchInput}%';";
        */

        //execute the query and save the query result
        $result = $conn->query($sql_query);

        //close active connection
        $conn->close();        

        //if there is a result, meaning the query worked
        if($result){

            //then iterate over the results and create the cards
            if ($result->num_rows > 0) {

                // create a card for the data of each row
                while($row = $result->fetch_assoc()) {
                echo "<tr id='customer'>
                        <th scope='row'><a href='/Learn-PHP-SQL/customers/view-customer.php?id={$row['id']}'>{$row['id']}</a></th>
                        <td>{$row['firstName']}</td>
                        <td>{$row['lastName']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['birthday']}</td>
                    </tr>";
                };
            } else {
                echo "<tr>
                <th scope='row'>0</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>";
            };
        };

    };

};