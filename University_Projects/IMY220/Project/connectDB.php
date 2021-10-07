<?php
    // See all errors and warnings
    error_reporting(E_ALL);
    ini_set('error_reporting', E_ALL);

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "theCloudDB";
    $mysqli = mysqli_connect($server, $username, $password, $database);
?>