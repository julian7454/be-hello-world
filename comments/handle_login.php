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
		"SELECT * FROM users WHERE username='%s' AND PASSWORD='%s'",
		$username,
        $password,
	);

	$result = $conn->query($sql);
	if (!$result) {
		die($conn->error);
	}

    // print_r($result);
    if ($result->num_rows) {
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
