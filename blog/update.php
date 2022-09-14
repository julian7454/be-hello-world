<?php
    require_once('./conn.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id=" . $id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql_category = "SELECT * FROM categories ORDER BY created_at DESC";
    $result_category = $conn->query($sql_category);
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
    <h1>編輯文章</h1>
    <form action="handle_update.php" method="post">
        <div>標題 <input name="title" value="<?php echo $row['title'] ?>"></div><br><br>
        <div>內容 <textarea name="content" cols="30" rows="10"><?php echo $row['content'] ?></textarea></div>
        <div>
            分類 <select name="category_id" value="<?php echo $row['category_id'] ?>">
                <?php
                    while($row_category = $result_category->fetch_assoc()) {
                        $id = $row_category["id"];
                        $name = $row_category["name"];
                        $is_selected = $row['category_id'] === $id ? "selected" : "";
                        echo "<option value='$id' $is_selected>$name</option>";
                    }
                ?>
            </select>
        </div>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit">
    </form>
</body>
</html>