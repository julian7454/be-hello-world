<?php
    // 不上 git
    $servername = 'localhost';
    $username = 'julian';
    $password = '0000';
    $db_name = 'julian';
    $conn = new mysqli($servername, $username, $password, $db_name);

    // print_r($conn);
    if (!empty($conn->connect_error)) {
        // 不往下執行
        die('資料庫連線錯誤' . $conn->connect_error);
    }

    $conn->query('SET NAMES UTF8');
    $conn->query('SET time_zone = "+8:00"');
?>