<?php
    require_once('conn.php');
    if (empty($_POST['username'])) {
		die('請輸入 username');
	}

	// $result = $conn->query("select now() as n");
	// 取得資料
	//$result = $conn->query("select id, username from users");
	$username = $_POST['username'];

	// 新增資料
	$sql = sprintf(
		"insert into users(username) values('%s')",
		$username
	);
	// echo 'SQL: ' . $sql . '<br>';
	$result = $conn->query($sql);
	if (!$result) {
		die($conn->error);
	}

	// echo('success');
    header("Location: ./index.php");
?>

<a href="./index.php">back</a>