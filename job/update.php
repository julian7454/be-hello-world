<?php
    require_once('./conn.php');
    $id = $_GET['id'];

    $sql = "SELECT * FROM jobs where id = " . $id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jobs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>jobs 編輯</h1>
        <a href="./admin.php">回管理頁</a>
        <form method="POST" action="./handle_update.php">
            <div>職缺名稱：<input name="title" value="<?php echo $row['title'] ?>" /></div>
            <div>職缺描述：<textarea name="description" rows="10"><?php echo $row['description']?></textarea></div>
            <div>薪資範圍：<input name="salary" value="<?php echo $row['salary'] ?>" /></div>
            <div>職缺連結：<input name="link" value="<?php echo $row['link'] ?>" /></div>
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <input type="submit" value="送出" />
        </form>
    </div>
</body>
</html>