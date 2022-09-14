<?php
    require_once('./conn.php');
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
        <h1>jobs 後台</h1>
        <a href="./add.php">新增職缺</a>
        <div class="jobs">
            <?php
                $sql = 'SELECT * FROM jobs ORDER BY created_at DESC';
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="job">';
                        echo '<h2 class="job__title">' . $row['title'] .'</h2>';
                        echo '<p class="job__desc">' . $row['description'] .'</p>';
                        echo '<p class="job__salary">薪資範圍: ' . $row['salary'] .'</p>';
                        echo '<a class="job__link" href="./update.php?id='
                        . $row['id'] . '">編輯</a>';
                        echo ' <a class="job__link" href="./delete.php?id='
                        . $row['id'] . '">刪除</a>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>