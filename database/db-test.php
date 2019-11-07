<?php
    // mysql -u ta_manager_app -h localhost -p --port 3306 ta_manager
    $host = "127.0.0.1";
    $database = "ta_manager";
    $user = "ta_manager_app";
    $password = "s3kuDoG";
    $port = 3306;  //this should probably be 3306 (mysql default) for most of you

    // $conn = mysqli_connect($host, $user, $password, $database, $port);

    $connection = new mysqli($host, $user, $password, $database, $port);
    if ($connection->connect_errno) {
        echo "Failed to connect to MySQL: (" . $connection->connect_errno . ") " . $connection->connect_error;
    } else {
        printf("yay");
    }
?>