<?php
    session_start();
    require_once('conn.php');
    require_once('utils.php');

    if (empty($_POST['content'])) {
        header("Location: update_comment.php?errCode=1&id=" . $_POST['id']);
        die('資料不齊');
    }

    $username = $_SESSION['username'];
    $id = $_POST['id'];
    $content = $_POST['content'];

    $sql = "update comments set content=? where id=? and username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $content, $id, $username);
    $result = $stmt->execute();

    if (!$result) {
        die($conn->error);
    }

    // echo('success');
    header("Location: ./index.php");
?>
