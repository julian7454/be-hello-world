<?php
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
        $token = generateToken();
        $sql = sprintf(
            "insert into tokens(token, username) values('%s', '%s')",
            $token,
            $username
        );

        $result = $conn->query($sql);
        if (!$result) {
            die($conn->error);
        }

        $expire = time() + 3600 * 24 * 30; // 30 d
        setcookie("token", $token, $expire);
        header("Location: index.php");
    } else {
        header("Location: login.php?errCode=2");
    }
?>
