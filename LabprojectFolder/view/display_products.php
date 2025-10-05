<?php
    require_once('../controller/productinfo_controller.php');
    $user_arr = get_products();
?>
<style>
    table {
        border-spacing: 5px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
        text-align: center;
    }
    th {
        background-color:lightskyblue;
    }
    tr:nth-child(even) {
        background-color:whitesmoke;
    }
    tr:nth-child(odd) {
        background-color:lightgray;
    }
</style>
<html>
    <head>
        <title>Final Project - Raymond Marquis</title>
    </head>

    <body>
        <h2>Current Users:</h2>
        <table>
            <tr style="font-size:large;">
                <th>ID #</th>
                <th>Product Name Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            
            <?php foreach($user_arr as $user):;?>
                <tr>
                    <td><?php echo $user["productID"];?></td>
                    <td><?php echo $user["productName"];?></td>
                    <td><?php echo $user["productDesc"];?></td>
                    <td><?php echo $user["productPrice"];?></td>
                </tr>
            <?php endforeach;?>
        </table>
    </body>
</html>