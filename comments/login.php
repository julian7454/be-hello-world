<?php
    require_once('./conn.php');

    $result = $conn->query("SELECT * FROM comments order by id desc");

    if (!$result) {
      die('ERROR:' . $conn->error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>留言板</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="warning">
    <!-- <strong>注意！本站為練習用網站，因教學用途刻意忽略資安的實作，註冊時請勿使用任何真實的帳號或密碼。</strong> -->
  </header>
  <main class="board">
      <a class="board_btn" href="index.php">回留言板</a>
      <a class="board_btn" href="register.php">註冊</a>
      <h1 class="board__title">登入</h1>
      <?php
        $msg = 'error';
        if (!empty($_GET['errCode'])) {

          if ($_GET['errCode'] === '1') {
            $msg = '資料不齊全';
          }

          if ($_GET['errCode'] === '2') {
            $msg = '帳號或密碼輸入錯誤';
          }

          echo '<h4 class="error">' . $msg . '</h4>';
        }
      ?>
      <form class="board__new-comment-form" method="POST" action="handle_login.php">
        <!-- <div class="board__nickname">
          <span>暱稱：</span>
          <input type="text" name="nickname" />
        </div> -->
        <div class="board__nickname">
          <span>帳號：</span>
          <input type="text" name="username" />
        </div>
        <div class="board__nickname">
          <span>密碼：</span>
          <input type="password" name="password" />
        </div>
        <input class="board__submit-btn" type="submit" />
      </form>
      <div class="board__hr"></div>

  </main>
</body>
</html>