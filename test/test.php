<?php
    //echo '<br> now:' . $row['n'];

    // 用 empty 檢查表單是否為空
    if (empty($_GET['name']) || empty($_GET['age'])){
        echo '資料有缺，請再次填寫<br>';
        exit();   // 終止程序
    };
    // 接收 method 為 GET 的 From input
    echo "Hello!" . $_GET['name'] . " <br>";
    echo "Your age is" . $_GET['age'] . " <br>";

    // print_r($_GET);
?>