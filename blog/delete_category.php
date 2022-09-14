<?php
    require_once('./conn.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM categories where id=" . $id;

    if ($conn->query($sql)) {
        header("Location: ./admin_category.php");
    } else {
        echo "failed " . $conn->error;
    }

?>