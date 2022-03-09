<?php
require_once(__DIR__ .'/../config.php');


function search_customers($search){

    //have the functions recognize mysqli as a global variable
    global $mysqli;

    //if the form sent valid data, fill the initialized user with data
    if(isset($_GET['searchBox'])){

        $searchInput = $_GET['searchBox'];

        $columns = mysqli_query($mysqli, "SELECT COLUMN_NAME FROM information_schema.COLUMNS WHERE TABLE_NAME = 'customers' AND TABLE_SCHEMA = 'ripnship'");

        //build ending like clauses of query for every column in the table
        //doing this accounts for table growth without having to edit this to search new columns
        $queryAllColumns = array();
        while ($column = mysqli_fetch_assoc($columns)) {
            $queryAllColumns[] = $column['COLUMN_NAME'] . " LIKE '%$searchInput%'";
        };

        //create the full select query to search for the input in all customer columns
        $sql_query = "SELECT * FROM customers WHERE " . implode(" OR ", $queryAllColumns);
        
        //execute the query and save the query result
        $result = mysqli_query($mysqli, $sql_query);

        //if there is a result, meaning the query worked
    if($result){

        //then iterate over the results and create the cards
        if (mysqli_num_rows($result) > 0) {

            // create a card for the data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <th scope='row'><a href='/Learn-PHP-SQL/customers/edit-customer.php?id={$row['id']}'>{$row['id']}</a></th>
                    <td>{$row['firstName']}</td>
                    <td>{$row['lastName']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['birthday']}</td>
                </tr>";
            }
        } else {
            echo "<tr>
            <th scope='row'>0</th>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>";
        }};
    };
    

    //close active connection
    mysqli_close($mysqli);

};

//function to search for a customer
function customer_search($customerId){
    
    //have the functions recognize mysqli as a global variable
    global $mysqli;

    //build the query
    $sql_query = "SELECT * FROM `customers` WHERE `id` = {$customerId}";

    //execute query
    $result = mysqli_query($mysqli, $sql_query);

    //if sql returned something
    if($result){

        //if we got a valid result
        if (mysqli_num_rows($result) > 0) {

            // output the customer data from the query
            $row = mysqli_fetch_assoc($result);
            
            //return the customer
            return $row;
        } else {
            echo "Error!";
        }};

        //close active connection
        mysqli_close($mysqli);
};

?>