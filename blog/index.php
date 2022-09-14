<? require_once('./conn.php'); ?>
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
        <div class="articles">
            <?php
                $sql = "SELECT * FROM articles ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $title = $row['title'];

                        echo '<div class="article">';
                        echo "<h2><a href='./article.php?id=$id'>$title</a></h2>";
                        echo "</div>";
                    }
                }
            ?>
            <div class="article">
                <h2><a href="./article.php">標題</a></h2>
            </div>
        </div>
    </div>
</body>
</html>