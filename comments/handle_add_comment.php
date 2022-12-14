<?php
    session_start();
    require_once('conn.php');
    require_once('utils.php');

    if (empty($_POST['content'])) {
        header("Location: ./index.php?errCode=1");
        die('資料不齊');
    }

    $username = $_SESSION['username'];
    $content = $_POST['content'];

    // 新增資料
    $sql = "INSERT INTO comments(username, content) VALUES(?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $content);
    $result = $stmt->execute();

    if (!$result) {
        die($conn->error);
    }

    // echo('success');
    header("Location: ./index.php");
?>

<a href="./index.php">back</a>