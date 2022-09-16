<?php
	session_start();
    require_once('conn.php');

    if (empty($_POST['nickname']) || empty($_POST['username']) || empty($_POST['password'])) {
		header("Location: ./register.php?errCode=1");
		die('資料不齊');
	}

	$nickname = $_POST['nickname'];
	$username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	// 新增資料
	$sql = sprintf(
		"INSERT INTO users(nickname, username, password) VALUES('%s', '%s', '%s')",
		$nickname,
		$username,
        $password,
	);

	$result = $conn->query($sql);
	if (!$result) {
        // dir 需拼接成字串才會顯示
        $code = $conn->errno;

        if ($code === 1062) {
            header("Location: ./register.php?errCode=2");
        }

        // if (strpos($conn->error, "Duplicate entry") !== false) {
        //     header("Location: ./register.php?errCode=2");
        // }
		die($conn->error);
	}

	$_SESSION['username'] = $username;
    header("Location: ./index.php");
?>
