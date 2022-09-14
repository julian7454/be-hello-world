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
        <h1>jobs</h1>
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
                        echo '<a class="job__link" href="' . $row['link'] .'">更多資訊</a>';
                        echo '</div>';
                    }
                }
            ?>
            <!-- <div class="job">
                <h2 class="job__title">前端</h2>
                <p class="job__desc">前端描述前端描述前端描述前端描述前端描述前端描述前端描述前端描述</p>
                <p class="job__salary">薪資範圍: 面議</p>
                <a class="job__link" href="">更多資訊</a>
            </div> -->
        </div>
    </div>
</body>
</html>