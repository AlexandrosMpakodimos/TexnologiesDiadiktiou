<?php 
    $host = "localhost";
    $port = 8080;
    $dbname = "texnologies_diadiktiou_db";
    $db_username = "root";
    $db_password = "root";

    $conn = mysqli_connect($host, 
                        $db_username, 
                        $db_password, 
                        $dbname, 
                        $port);

    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_error());
    }