<?php
    require_once('./conn.php');

    $title = $_POST['title'];
    $desc = $_POST['description'];
    $salary = $_POST['salary'];
    $link = $_POST['link'];

    if (empty($title) || empty($desc) || empty($salary) || empty($link)) {
        die('請檢查資料');
    }

    $sql = "INSERT INTO jobs(title, description, salary, link) VALUES('$title', '$desc', '$salary', '$link')";
    $result = $conn->query($sql);

    if ($result) {
        header('Location: ./admin.php');
    } else {
        echo 'failed ' . $conn->error;
    }
?>