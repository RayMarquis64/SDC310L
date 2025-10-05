<?php
    function get_db_conn()
    {
        //Connect to Database  
        $hostname = "localhost";
        $username = "ecpi_user";
        $password = "Password1";
        $dbname = "labproject";
        return mysqli_connect($hostname, $username, $password, $dbname);
    }
?>