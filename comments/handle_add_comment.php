<?php
    require_once('conn.php');

    if (empty($_POST['nickname']) || empty($_POST['content'])) {
		header("Location: ./index.php?errMsg=資料不齊全");
		die('資料不齊');
	}

	// $result = $conn->query("select now() as n");
	// 取得資料
	//$result = $conn->query("select id, username from users");
	$nickname = $_POST['nickname'];
	$content = $_POST['content'];

	// 新增資料
	$sql = sprintf(
		"INSERT INTO comments(nickname, content) VALUES('%s', '%s')",
		$nickname,
		$content,
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