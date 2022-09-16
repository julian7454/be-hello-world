<?php
    session_start();
    require_once('conn.php');
    require_once('utils.php');

    if (empty($_POST['username']) || empty($_POST['password'])) {
		header("Location: ./login.php?errCode=1");
		die('資料不齊');
	}

	$username = $_POST['username'];
    $password = $_POST['password'];

	// 新增資料
	$sql = sprintf(
		"SELECT * FROM users WHERE username='%s'",
		$username,
	);

	$result = $conn->query($sql);
	if (!$result) {
		die($conn->error);
	}

    if ($result->num_rows === 0) {
        header("Location: login.php?errCode=2");
        exit();
    }

    $row = $result->fetch_assoc();
    // 密碼驗證
    if (password_verify($password, $row['password'])) {
        /*
            1. 產生 session id (token)
            2. 把 username 寫入檔案
            3. set-cookie: session id
        */
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        header("Location: login.php?errCode=2");
    }
?>
