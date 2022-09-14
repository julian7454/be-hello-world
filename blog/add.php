<?php
    require_once('./conn.php');
    $sql = "SELECT * FROM categories ORDER BY created_at DESC";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog 分類</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>新增文章</h1>
    <form action="./handle_add.php" method="post">
        <div>標題 <input name="title"></div><br><br>
        <div>內容 <textarea name="content" id="" cols="30" rows="10"></textarea></div>
        <div>
            分類 <select name="category_id" id="">
                <?php
                    while($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $name = $row["name"];

                        echo "<option value='$id'>$name</option>";
                    }
                ?>
            </select>
        </div>
        <input type="submit">
    </form>
</body>
</html>