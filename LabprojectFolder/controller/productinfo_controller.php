<?php
require_once('../model/productinfo_db.php');

function get_products()
{
    $user_rows = get_all_products();
    $users = array();

    if ($user_rows) {
        $index = 0;
        //if query was successful. fill array
        while($row = mysqli_fetch_array($user_rows)) {
            $users[$index]["productID"] = $row["productID"];

            //tramsfpr, the name fields from db to first last
            $users[$index]["productName"] = $row["productName"];
            $users[$index]["productDesc"] = $row["productDesc"];
            $users[$index]["productPrice"] = $row["productPrice"];
            $index++;
        }
    }

    return $users;
}

?>