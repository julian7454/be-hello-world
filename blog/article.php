<?
    require_once('./conn.php');
    $id = $_GET['id'];
    // LEFT JOIN categories as C ON A.category_id = C.id
    $sql = "SELECT A.id, A.title, A.content, C.name FROM articles as A LEFT JOIN categories as C ON A.category_id = C.id WHERE A.id = " . $id;
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $title = $row['title'];
    $content = $row['content'];
    $name = $row['name'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="nav">
        <h1>Blog</h1>
        <a href="./" class="active">首頁</a>
        <a href="./about.php">關於我</a>
    </nav>
    <div class="container">
        <h1 class="single-article"><?php echo $title; ?></h1>
        <h2>分類： <?php echo $name; ?></h2>
        <p><?php echo $content; ?></p>
    </div>
</body>
</html>