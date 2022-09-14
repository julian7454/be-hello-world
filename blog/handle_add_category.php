<?php
    require_once('./conn.php');

    $name = $_POST['name'];

    if (empty($name)) {
        dir('empty data');
    }

    $sql = "INSERT INTO categories(name) VALUES('$name')";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: ./admin_category.php");
    } else {
        die("failed. " . $conn->error);
    }
?>