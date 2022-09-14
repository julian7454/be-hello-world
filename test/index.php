<?php
	require_once('conn.php');

	// $row = $result->fetch_assoc();
	// print_r($row);
	// $row = $result->fetch_assoc();
	// print_r($row);
	$result = $conn->query("SELECT id, username FROM users ORDER BY id DESC");

	while ($row = $result->fetch_assoc()) {
		echo "id:" . $row['id'];
		echo "<a href='delete.php?id=" . $row['id'] . "'>刪除</a><br>";
		echo "username:" . $row['username'] . '<br>';
	}
?>
<h3>新增</h3>
<form method="POST" action="add.php">
  username: <input type="text" name="username"/>
  <!-- age: <input type="text" name="age"/> -->
  <input type="submit"/>
</form>

<h3>編輯</h3>
<form method="POST" action="update.php">
  id: <input type="text" name="id"/>
  username: <input type="text" name="username"/>
  <!-- age: <input type="text" name="age"/> -->
  <input type="submit"/>
</form>