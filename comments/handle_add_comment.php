<?php
    session_start();
    require_once('conn.php');
    require_once('utils.php');

    if (empty($_POST['content'])) {
        header("Location: ./index.php?errCode=1");
        die('資料不齊');
    }

    $user = getUserFromUsername($_SESSION['username']);
    $nickname = $user['nickname'];

    $username = $_COOKIE['username'];
    $user_sql = sprintf(
        'SELECT nickname FROM users WHERE username="%s"',
        $username
    );
    $user_result = $conn->query($user_sql);
    $row = $user_result->fetch_assoc();

    $content = $_POST['content'];

    // 新增資料
    $sql = "INSERT INTO comments(nickname, content) VALUES(?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $nickname, $content);
    $result = $stmt->execute();

    if (!$result) {
        die($conn->error);
    }

    // echo('success');
    header("Location: ./index.php");
?>

<a href="./index.php">back</a>