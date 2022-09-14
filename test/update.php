<?php
    require_once('conn.php');

    if (empty($_POST['id']) || empty($_POST['username'])) {
		die('請輸入 id 與 username');
	}

	$id = $_POST['id'];
	$username = $_POST['username'];
	// 刪除資料 (不存在 id 也不會失敗, 只是影響 0 筆)
	$sql = sprintf(
		"update users set username='%s' where id=%d",
		$username,
		$id
	);
	echo 'SQL: ' . $sql . '<br>';
	$result = $conn->query($sql);
	if (!$result) {
		die($conn->error);
	}

    header("Location: ./index.php");
?>

<a href="./index.php">back</a>