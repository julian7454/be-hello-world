<?php
    $servername = 'localhost';
    $username = 'julian';
    $password = '0000';
    $dbname = 'julian';

    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->query("SET_NAMES_UTF8");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
?>