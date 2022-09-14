<?php
    require_once('conn.php');

    if (empty($_GET['id'])) {
		die('請輸入 id');
	}

	$id = $_GET['id'];

	// 刪除資料 (不存在 id 也不會失敗, 只是影響 0 筆)
	$sql = sprintf(
		"delete from users where id = %d",
		$id
	);
	// echo 'SQL: ' . $sql . '<br>';
	$result = $conn->query($sql);
	if (!$result) {
		die($conn->error);
	}
	// 判斷影響資料
	if ($conn->affected_rows >= 1) {
		echo '刪除成功';
	} else {
		echo '查無刪除資料';
	}
    // header("Location: ./index.php");
?>

<a href="./index.php">back</a>