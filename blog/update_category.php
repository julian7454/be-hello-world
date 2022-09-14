<?php
    require_once('./conn.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id=" . $id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>編輯分類</h1>
    <form action="handle_update_category.php" method="post">
        名稱 <input name="name" value="<?php echo $row['name']; ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit">
    </form>
</body>
</html>