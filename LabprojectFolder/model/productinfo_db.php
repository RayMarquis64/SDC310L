<?php
require_once('database.php');

// get all entries in the userinfo table
function get_all_products()
{
    //query for all users
    $conn = get_db_conn();
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
    return $result;
}

?>