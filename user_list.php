<?php
 //Connect to Database  
 $hostname = "localhost";
 $username = "ecpi_user";
 $password = "Password1";
 $dbname = "labproject";
 $conn = mysqli_connect($hostname, $username, $password, $dbname);
 
 //establish variables to support add/edit/delete
 $userNo= -1;
 $productID = '';
 $productName = '';
 $productDesc = '';
 $price = 0;


 //variables to determine the type of operation
 $add = false;
 $edit = false;
 $update = false;
 $delete = false;

 if (isset($_POST['productID'])) {
    $productID = $_POST['productID'];
    $add = isset($_POST['add']);
    $update = isset($_POST['update']);
    $edit = isset($_POST['edit']);
    $delete = isset($_POST['delete']);
 }

 if ($add) {
    //add new user
    $productName = $_POST['pname'];
    $productDesc = $_POST['pdesc'];
    $price = $_POST['price'];
    

    $addQuery = "INSERT INTO
      products (productName, productDesc, productPrice,)
      VALUES ('$productName','$productDesc','$price)";
   mysqli_query($conn, $addQuery);

   //clear the fields
   $userNo= -1;
   $productID = '';
   $productName = '';
   $productDesc = '';
   $price = 0;
 }
 else if ($edit) {
   //get user info
   $selQuery = "SELECT * products WHERE productID = $productID";
   $result = mysqli_query($conn, $selQuery);
   $userInfo = mysqli_fetch_assoc($result);

   //fill in values allow for edit
   $productName = $_POST['pname'];
   $productDesc = $_POST['pdesc'];
   $price = $_POST['price'];
 }
 else if ($update) {
    //updated values submitted
    $productName = $_POST['pname'];
    $productDesc = $_POST['pdesc'];
    $price = $_POST['price'];

    $updQuery = "UPDATE products SET
      productName = '$productName', productDesc = '$productDesc',
        productPrice = $price, productID = $productID";
   mysqli_query($conn, $updQuery);

   //clear the fields
   $userNo= -1;
   $productID = '';
   $productName = '';
   $productDesc = '';
   $price = 0;
 }
 else if ($delete) {
    //neeeded to delet selected user
    $delQuery = "DELETE FROM products WHERE productID = $productID";
    mysqli_query($conn, $delQuery);
    $productID = -1;
 }

 //Query for all users
 $query = "SELECT * FROM products";
 $result = mysqli_query($conn, $query);
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
        <title>Lab Project - Raymond Marquis</title>
    </head>

    <body>
        <h2>Products</h2>
        <table>
            <tr style="font-size:large;">
                <th>Product Number</th>
                <th>Product Name</th>
                <th>Product Desc</th>
                <th>Price</th>
                <th></th>
                <th></th>
            </tr>

            <?php while($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td><?php echo $row["productID"];?></td>
                    <td><?php echo $row["productName"];?></td>
                    <td><?php echo $row["productDesc"];?></td>
                    <td><?php echo $row["productPrice"];?></td>
                    <td>
                        <form method='POST'>
                            <input type="submit" value="Edit" name="edit">
                            <input type="hidden"
                                   value="<?php echo $row["productID"]; ?>"
                                   name="productID">
                        </form>
                    </td>
                    <td>
                        <form method='POST'>
                            <input type="submit" value="Delete" name="delete">
                            <input type="hidden"
                                   value="<?php echo $row["productID"]; ?>"
                                   name="productID">
                        </form>
                    </td>
                </tr>
            <?php endwhile;?>
        </table>
        <form method='POST'>
            <input type="hidden" value="<?php echo $userNo; ?>" name="productID">
            <h3>Enter product name: <input type="text" name="pname"
                                             value="<?php echo $productName; ?>"></h3>
            <h3>Enter product desc: <input type="text" name="pdesc"
                                            value="<?php echo $productDesc; ?>"></h3>
            <h3>Enter product price: <input type="text" name="price"
                                                value="<?php echo $price; ?>"></h3>
            <?php if (!$edit): ?>
                <input type="submit" value="Add product" name="add">
            <?php else: ?>
                <input type="submit" value="Update product" name="update">
            <?php endif; ?>
        </form>
    </body>
</html>