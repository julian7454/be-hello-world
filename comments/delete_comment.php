<?php
    session_start();
    require_once('conn.php');
    require_once('utils.php');

    if (empty($_GET['id'])) {
        header("Location: index.php?errCode=1&id");
        die('資料不齊');
    }

    $username = $_SESSION['username'];
    $id = $_GET['id'];

    $sql = "update comments set is_deleted=1 where id=? and username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $id, $username);
    $result = $stmt->execute();

    if (!$result) {
        die($conn->error);
    }

    // echo('success');
    header("Location: ./index.php");
?>
