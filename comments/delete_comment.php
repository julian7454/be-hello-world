<?php
    session_start();
    require_once('conn.php');
    require_once('utils.php');

    if (empty($_GET['id'])) {
        header("Location: index.php?errCode=1&id");
        die('資料不齊');
    }

    $id = $_GET['id'];

    $sql = "update comments set is_deleted=1 where id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    $result = $stmt->execute();

    if (!$result) {
        die($conn->error);
    }

    // echo('success');
    header("Location: ./index.php");
?>
